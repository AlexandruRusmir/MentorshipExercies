<?php

include __DIR__ . '\..\system\View.php';
use system\View as View;

class CurrencyConverterView extends View
{
    public function __construct(
        private $controller,
        private array $models)
    {
    }

    public function returnExitButton()
    {
        return '<a class="btn-danger" href="../views/linkForm.php"></a>';
    }

    public function returnContainer($containerTitle, $containerContent)
    {
        return "<div class='container'>
                    <h1>
                        ${containerTitle}
                    </h1>"
            . $this->$containerContent()
            . '</div>';
    }

    public function returnForm()
    {
        $htmlString = "<div class='form-container'>";
        forEach ($this->models as $model){
            $currency = $model->getCurrency();
            $value = $model->getValue();
            $conversionRate = $model->getConversionRate();
            $inputName = $currency . 'val';
            $conversionRateName = $currency . 'conv';
             $htmlString .= "
                    <form method='post'>
                        <label>${currency}</label>
                        <input type='text' name='${inputName}' style='width: 30%' value='${value}'>
                        <button type='submit'
                              style='border-radius: 20px' class='btn-success ml-3'> Convert!
                        </button>
                        <input type='hidden' name='convert'
                                 value='${currency}'/>
                         <input type='hidden' name='${conversionRateName}'
                                 value='${conversionRate}'/>
                    </form> ";
        }
        $htmlString .= "</div>";
        return $htmlString;
    }


}