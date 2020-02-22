<?php


namespace Ministrare\LaravelCorePackage\Library;

class Form
{
    private $settings = [];

    /**
     * @param $method  "POST"|"GET"
     * @param $route  "Route" with or without attributes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Method($method, $route)
    {
        return view('laravel-core-package::form.elements.method')->with(['method' => $method, 'route' => $route]);
    }

    /**
     * @param string $type Type-property
     * @param string|null $label Used as label
     * @param null $slug Used for error/id/name
     * @param array $options
     * @return Form Current object
     */
    public function Input(string $type, string $label = null, $slug = null, $options = [])
    {
        $this->settings['type'] = $type;

        if(isset($label)){
            $this->Label($label);
            $this->Slug(isset($slug) ? $slug : $label);
            if(isset($options))
                $this->Options($options);
        }

        return $this;
    }

    /**
     * @param string $label Used as label
     * @return Form
     */
    public function Label(string $label)
    {
        $this->settings['label'] = $label;
        return $this;
    }

    /**
     * @param string $slug Used for error/id/name
     * @return Form
     */
    public function Slug(string $slug)
    {
        $this->settings['slug'] = Utilities::createSlug($slug);

        return $this;
    }

    /**
     * @param array $options Array of list of options
     * List of posible options:
     * - Autocomplete   - Key => Boolean,
     * - Autofocus      - Key => Boolean,
     * - Class          - Key => String,
     * - Icon           - Key => String,
     * - Message        - Key => String,
     * - Options        - array( [Slug => Label] )
     * - Placeholder    - Key => String,
     * - Required       - Key => Boolean,
     * - Small          - Key => String,
     * - Value          - Key => String,
     * @return mixed
     */
    public function Options(array $options)
    {
        $settings = [];

        foreach($options as $optionKey => $optionValue)
        {
            $settings[$optionKey] = $optionValue;
        }

        $this->settings += $settings;
        return $this;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function Render()
    {
        $settings = $this->settings;
        unset($this->settings);

        if(isset($settings['type']))
            switch ($settings['type']){

                case 'checkbox' :
                    $view = 'laravel-core-package::form.inputs.checkbox';
                    break;

                case 'email' :
                    $view = 'laravel-core-package::form.inputs.email';
                    break;

                case 'password' :
                    $view = 'laravel-core-package::form.inputs.password';
                    break;

                case 'radio' :
                    $view = 'laravel-core-package::form.inputs.radio';
                    break;

                case 'select' :
                    $view = 'laravel-core-package::form.inputs.select';
                    break;

                case 'string' :
                    $view = 'laravel-core-package::form.inputs.string';
                    break;

                case 'textarea' :
                    $view = 'laravel-core-package::form.inputs.textarea';
                    break;

                default :
                    return abort(404, 'input:Type not found');
                    break;
            }

        if(isset($view)){
            return view($view)->with($settings);
        }

        return abort(404, 'Forms class: No view found');
    }

    public function End()
    {
        return view('laravel-core-package::form.elements.end');
    }
}
