<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
            ->groupBy([
                'categories.title', 'categories.slug'
            ])
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('components.sidebar', compact('categories'));
    }
}