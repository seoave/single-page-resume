<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index(Factory $view)
    {
        $resume = Cache::remember(
            'resume_data',
            now()->addDay(),
            function () {
                $resume     = Storage::disk('resume')->get('resume.json');
                $resumeData = json_decode($resume, true);

                return Resume::fromArray($resumeData);
            }
        );

        return $view->make('resume', ['resume' => $resume]);
    }

    public function download()
    {
        $resume = Cache::remember(
            'resume_data',
            now()->addDay(),
            function () {
                $resume     = Storage::disk('resume')->get('resume.json');
                $resumeData = json_decode($resume, true);

                return Resume::fromArray($resumeData);
            }
        );

        $pdf = PDF::loadView('resume', ['resume' => $resume]);

        return $pdf->download($resume->basics->name . '-resume.pdf');
    }
}
