<?php

use Behat\Behat\Context\Context;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\TestResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http; 

class FeatureContext implements Context
{
    protected $app;
    protected $response;
    protected $formData = [];
    protected $user; // 1. Nova propriedade para guardar o usuário

    public function __construct()
    {
        putenv('APP_ENV=testing');
        require_once __DIR__ . '/../../vendor/autoload.php';
        $this->app = require __DIR__ . '/../../bootstrap/app.php';
        $this->app->make(Kernel::class)->bootstrap();
    }

    /**
     * @BeforeScenario
     */
    public function cleanDatabase()
    {
        Artisan::call('migrate:fresh');
    }

    /**
     * @Given que eu sou um usuário autenticado
     */
    public function queEuSouUmUsuarioAutenticado()
    {
        $user = new \App\Models\User();
        $user->name = 'Usuario Teste Behat';
        $user->email = 'behat_' . Str::random(10) . '@teste.com';
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();
        
        $this->user = $user; // 2. Guardamos o usuário na classe
        Auth::login($this->user);
    }

    /**
     * @Given que eu estou na página :url
     * @When eu acesso a página :url
     */
    public function euAcessoAPagina($url)
    {
        // 3. Reforçamos o login antes de cada acesso GET
        if ($this->user) {
            Auth::login($this->user);
        }

        $request = Request::create($url, 'GET');
        $this->app['session']->start();
        $request->setLaravelSession($this->app['session']->driver());

        $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
    }

    /**
     * @When eu preencho :campo com :valor
     */
    public function euPreenchoCom($campo, $valor)
    {
        $this->formData[$campo] = $valor;
    }

    /**
     * @When eu seleciono :valor de :campo
     */
    public function euSelecionoDe($valor, $campo)
    {
        if ($campo === 'type') {
            $valor = strtolower($valor);
        }
        $this->formData[$campo] = $valor;
    }

    /**
     * @When eu pressiono :botao
     */
    public function euPressiono($botao)
    {
        $this->app['session']->start();

        // CASO 1: SALVAR (Criação - POST)
        if (str_contains($botao, 'Salvar')) {
            $request = Request::create('/transactions', 'POST', $this->formData);
            $request->setLaravelSession($this->app['session']->driver());
            $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
        }
        
        // CASO 2: ATUALIZAR (Edição - PUT)
        // Assumimos que estamos editando a transação de ID 1 para este teste
        elseif (str_contains($botao, 'Atualizar')) {
            // Nota: Em formulários HTML normais, o método é POST com um campo _method=PUT.
            // Mas aqui simulamos a requisição direta, então usamos PUT.
            $request = Request::create('/transactions/1', 'PUT', $this->formData);
            $request->setLaravelSession($this->app['session']->driver());
            $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
        }
        elseif (str_contains($botao, 'Apagar')) {
            $request = Request::create('/transactions/1', 'DELETE');
            $request->setLaravelSession($this->app['session']->driver());
            $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
        }
        elseif ($botao === 'Salvar Perfil') {
            $request = Request::create('/profile', 'PATCH', $this->formData);
            $request->setLaravelSession($this->app['session']->driver());
            $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
        }
        else {
            throw new Exception("Botão '{$botao}' não configurado no FeatureContext.");
        }
    }

    /**
     * @Then eu devo estar na página :url
     */
    public function euDevoEstarNaPagina($url)
    {
        if ($this->response->status() === 302) {
            $location = $this->response->headers->get('Location');
            // Aceita URLs completas ou relativas
            if (!str_contains($location, $url)) {
                throw new Exception("Esperado redirecionar para '{$url}', mas foi para '{$location}'");
            }
            // Segue o redirecionamento
            $this->euAcessoAPagina($location);
        }
    }

    /**
     * @Then eu devo ver :texto
     * @Then eu devo ver o texto :texto
     */
    public function euDevoVer($texto)
    {
        // Se a resposta anterior foi um redirecionamento que não seguimos no passo anterior
        if ($this->response->status() === 302) {
            $targetUrl = $this->response->headers->get('Location');
            $this->euAcessoAPagina($targetUrl);
        }

        if (!str_contains($this->response->getContent(), $texto)) {
            // Debug: Salva o HTML num arquivo para você ver o que está acontecendo se falhar
            // file_put_contents('debug_behat.html', $this->response->getContent());
            
            throw new Exception("O texto '{$texto}' não foi encontrado na página.");
        }
    }
    
    /**
     * @Then a resposta deve ser sucesso
     */
    public function aRespostaDeveSerSucesso()
    {
        if ($this->response->status() !== 200) {
             throw new Exception("Status incorreto: " . $this->response->status());
        }
    }

    /**
    * @Given que a IA vai responder :texto
     */
    public function queAIaVaiResponder($texto)
    {
        // MOCK DO OLLAMA (Estrutura exata que o seu Controller espera)
        \Illuminate\Support\Facades\Http::fake([
            '*' => \Illuminate\Support\Facades\Http::response([
                'model' => 'llama3.2',
                'created_at' => '2023-08-04T19:22:45.499127Z',
                'message' => [
                    'role' => 'assistant',
                    'content' => $texto // Injetamos o texto do cenário aqui
                ],
                'done' => true
            ], 200),
        ]);
    }

    /**
     * @When eu envio a mensagem :mensagem para o chat
     */
    public function euEnvioAMensagemParaOChat($mensagem)
    {
        // Garante login
        if ($this->user) {
            Auth::login($this->user);
        }

        // Cria uma requisição JSON (como o JavaScript faria)
        $request = Request::create('/chat/send', 'POST', [], [], [], [], json_encode([
            'message' => $mensagem
        ]));
        
        // Define que é um JSON
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');

        // Configura sessão
        $this->app['session']->start();
        $request->setLaravelSession($this->app['session']->driver());

        // Executa
        $this->response = TestResponse::fromBaseResponse($this->app->handle($request));
    }

    /**
     * @Then eu devo receber uma resposta válida da IA
     */
    public function euDevoReceberUmaRespostaValida()
    {
        $conteudo = $this->response->getContent();
        
        // 1. Tenta decodificar o JSON
        $json = json_decode($conteudo, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("A resposta não é um JSON válido. Conteúdo recebido: " . substr($conteudo, 0, 200));
        }

        // 2. Verifica se a chave 'reply' existe (que é o que seu ChatController retorna)
        if (!isset($json['reply'])) {
            throw new Exception("O JSON retornado não contém a chave 'reply'. Chaves encontradas: " . implode(', ', array_keys($json)));
        }

        // 3. Verifica se a resposta não está vazia
        if (empty($json['reply'])) {
            throw new Exception("A IA retornou uma resposta vazia.");
        }
        
        // Se chegou aqui, é sucesso!
    }
    /**
     * @Then eu não devo ver o texto :texto
     */
    public function euNaoDevoVer($texto)
    {
        // Se a resposta contém o texto, então o teste falhou (porque não deveria conter!)
        if (str_contains($this->response->getContent(), $texto)) {
            throw new Exception("Erro: O texto '{$texto}' AINDA está na página, mas deveria ter sido apagado.");
        }
    }

    /**
     * @Then meu email deve ser :email
     */
    public function meuEmailDeveSer($email)
    {
        $this->user->refresh();
        
        if ($this->user->email !== $email) {
            throw new Exception("Erro: O email no banco é '{$this->user->email}', mas esperava '{$email}'.");
        }
    }
}