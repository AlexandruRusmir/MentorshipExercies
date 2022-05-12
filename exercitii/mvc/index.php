<?php
include './controllers/CurrencyConverterController.php';
include './models/CurrencyConverterModel.php';
include './views/CurrencyConverterView.php';


    if(!isset($modelsArray)){
        $modelsArray = [
            new CurrencyConverterModel(1, 'EUR', 1),
            new CurrencyConverterModel(4.73, 'RON', 4.73),
            new CurrencyConverterModel(0.89, 'GBP', 0.89),
            new CurrencyConverterModel(1.11, 'USD', 1.11)
        ];
    }

    $controller = new CurrencyConverterController($modelsArray);
    $view = new CurrencyConverterView($controller, $modelsArray);

    if (isset($_POST['convert']))
    {
        echo $_POST['convert'];
        echo $_POST[$_POST['convert'].'val'];
        $controller->modifyModels($_POST[$_POST['convert'] . 'conv'], $_POST[$_POST['convert'].'val']);
    }

    echo $view->returnHTMLHeadWithSpecificPageTitle('MVC Practice');
    echo $view->returnHeader();
    echo $view->returnContainer('MVC Practice', 'returnForm');
    echo $view->returnHTMLEnd();