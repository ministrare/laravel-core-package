<?php


namespace Ministrare\LaravelCorePackage\Library;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class Breadcrumb
{
    private $breadcrumbs = [];

    /**
     * @param array $newBreadcrumb
     * @return Breadcrumb Current object
     */
    public function Current($newBreadcrumb)
    {
        $this->breadcrumbs[100] = $newBreadcrumb;
        return $this;
    }

    /**
     * @param array $newBreadcrumb
     * @return Breadcrumb Current object
     */
    public function Add($newBreadcrumb)
    {
        $this->breadcrumbs += [$newBreadcrumb];
        return $this;
    }

    /**
     * @return Factory|View|void
     */
    public function Render()
    {
        ksort($this->breadcrumbs);
        if(count($this->breadcrumbs) == 0)
            return abort(404, 'Breadcrumb class: No breadcrumbs found');

        $sortedBreadcrumbs = [];
        foreach ($this->breadcrumbs as $key => $breadcrumb){
            $sortedBreadcrumbs[] = $breadcrumb;
        }
        $breadcrumbs['breadcrumbs'] = $sortedBreadcrumbs;
        unset($this->breadcrumbs, $sortedBreadcrumbs);

        return view('laravel-core-package::breadcrumbs.breadcrumbs')->with($breadcrumbs);
    }
}
