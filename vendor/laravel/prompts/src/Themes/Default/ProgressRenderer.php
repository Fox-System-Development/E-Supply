<?php

namespace Laravel\Prompts\Themes\Default;

use Laravel\Prompts\Progress;

class ProgressRenderer extends Renderer
{
    use Concerns\DrawsBoxes;

    /**
     * The character to use for the progress bar.
     */
    protected string $barCharacter = '█';

    /**
     * Render the progress bar.
     *
     * @param  Progress<int|iterable<mixed>>  $progress
     */
    public function __invoke(Progress $progress): string
    {
        $filled = str_repeat($this->barCharacter, (int) ceil($progress->percentage() * min($this->minWidth, $progress->terminal()->cols() - 6)));

        return match ($progress->state) {
            'submit' => $this
                ->box(
                    $this->dim($this->truncate($progress->label, $progress->terminal()->cols() - 6)),
                    $this->dim($filled),
<<<<<<< HEAD
                    info: $this->fractionCompleted($progress),
=======
                    info: $progress->progress.'/'.$progress->total,
>>>>>>> dev
                ),

            'error' => $this
                ->box(
                    $this->truncate($progress->label, $progress->terminal()->cols() - 6),
                    $this->dim($filled),
                    color: 'red',
<<<<<<< HEAD
                    info: $this->fractionCompleted($progress),
=======
                    info: $progress->progress.'/'.$progress->total,
>>>>>>> dev
                ),

            'cancel' => $this
                ->box(
                    $this->truncate($progress->label, $progress->terminal()->cols() - 6),
                    $this->dim($filled),
                    color: 'red',
<<<<<<< HEAD
                    info: $this->fractionCompleted($progress),
=======
                    info: $progress->progress.'/'.$progress->total,
>>>>>>> dev
                )
                ->error($progress->cancelMessage),

            default => $this
                ->box(
                    $this->cyan($this->truncate($progress->label, $progress->terminal()->cols() - 6)),
                    $this->dim($filled),
<<<<<<< HEAD
                    info: $this->fractionCompleted($progress),
=======
                    info: $progress->progress.'/'.$progress->total,
>>>>>>> dev
                )
                ->when(
                    $progress->hint,
                    fn () => $this->hint($progress->hint),
                    fn () => $this->newLine() // Space for errors
                )
        };
    }
<<<<<<< HEAD

    /**
     * @param  Progress<int|iterable<mixed>>  $progress
     */
    protected function fractionCompleted(Progress $progress): string
    {
        return number_format($progress->progress).' / '.number_format($progress->total);
    }
=======
>>>>>>> dev
}
