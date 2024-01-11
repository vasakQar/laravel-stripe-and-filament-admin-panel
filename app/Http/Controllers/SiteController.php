<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function aboutUs()
    {
        $widget = TextWidget::query()
            ->where('active', true)
            ->where('key', 'about-page')
            ->first();

        if (!$widget) {
            throw new NotFoundHttpException();
        }

        return view('about', compact('widget'));
    }
}
