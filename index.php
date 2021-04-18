<?php

class Progression
{
    private $text;
    private $a;

    public function __construct()
    {
        $this->a = 1;
    }

    private function createInput()
    {
        $string = '
                <div class="box">
                    <label class="input-text" for="collapsible' . $this->a . '" style="cursor: pointer;">
                        <input id="collapsible' . $this->a . '" onclick="checkedValueFinder()" class="messageCheckbox" type="checkbox" value="' . $this->a . '"> 
                        ' . $this->text . '
                    </label>
                </div>              
            ';

        return $string;
    }

    public function openDiv(string $divName)
    {
        $string = '
            <div class="' . $divName . '">
        ';

        return $string;
    }

    public function closeDiv()
    {
        $string = '
            </div>
        ';

        return $string;
    }

    private function setA()
    {
        $this->a = $this->a*2;
    }

    public function addInput($text)
    {
        $this->text = $text;
        $input = $this->createInput();
        $this->setA();

        return $input;
    }

    public function createPage()
    {
        echo '
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
                <title>Profi Research</title>
            </head>
            <body>
            <script src="/main.js"></script>
        ';
    }

    public function createQuestion(string $question)
    {
        $string = '
            <div class="question-box">
                <p class="question">' . $question . '</p>
            </div>
        ';
        
        return $string;
    }

    public function addNoneInput()
    {
        $string = '
            <div class="box">
                <label class="input-text" for="collapsible' . $this->a . '" style="cursor: pointer;">
                    <input id="collapsible' . $this->a . '" onclick="checkedValueFinder()" class="messageCheckbox" type="checkbox" value="0"> 
                    ЖИВОТНЫЕ ОТСУТСТВУЮТ
                </label>
            </div>
        ';

        return $string;
    }

    public function createResultInput()
    {
        $string = '
            <div class="box">
                <input class="value-input" id="hidden" value="19" type="text">
                <p class="value-input-text"> </p>
            </div>
        ';

        return $string;
    }

}

$prog = new Progression;

$prog->createPage();
echo $prog->openDiv('wrapper');
echo $prog->createQuestion('Какие животные у вас есть?');
echo $prog->openDiv('input-box');
echo $prog->addInput('Кошка');
echo $prog->addInput('Собака');
echo $prog->addInput('Попугай');
echo $prog->addInput('Рыбки');
echo $prog->addInput('Рептилии');
echo $prog->addNoneInput();
echo $prog->createResultInput();
echo $prog->closeDiv();
echo $prog->closeDiv();

?>
