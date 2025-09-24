<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Transações</title>
</head>
<body>
    <h1>Minhas Transações</h1>

    <a href="<?php echo e(route('transactions.create')); ?>">Adicionar Nova Transação</a>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Tipo</th>
                <th >Ações</th> 

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($transaction->date); ?></td>
                    <td><?php echo e($transaction->description); ?></td>
                    <td>R$ <?php echo e(number_format($transaction->amount, 2, ',', '.')); ?></td>
                    <td ><?php echo e($transaction->type); ?></td>
                    <td>
                        <a href="<?php echo e(route('transactions.edit', $transaction)); ?>">Editar</a>

                        <form action="<?php echo e(route('transactions.destroy', $transaction)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('Tem a certeza?');">Apagar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH /var/www/html/resources/views/transactions/index.blade.php ENDPATH**/ ?>