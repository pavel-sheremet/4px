<?php

namespace App\Listeners;

use App\Events\SectionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Intervention\Image\ImageManagerStatic as Image;

class SetSectionLogo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param SectionCreated $event
     * @return void
     */
    public function handle(SectionCreated $event)
    {
        if ($event->request->has('logo'))
        {
            if ($event->section->logo)
            {
                \Storage::disk('logo')->delete($event->section->logo);
            }

            $file = $event->request->file('logo');
            $path = $file->hashName();

            $image = Image::make($file)->widen(200, function ($constraint) {
                $constraint->upsize();
            });

            \Storage::disk('logo')->put($path, $image->stream());

            $event->section->logo = $path;
            $event->section->save();
        }
    }
}
