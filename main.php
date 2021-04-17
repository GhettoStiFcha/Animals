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
                <div class="wrapper">
                    <div class="input-box">
                        <div class="box">
                            <input onclick="checkedValueFinder()" class="messageCheckbox" type="checkbox" value="' . $this->a . '"> <p class="input-text">' . $this->text . '</p>
                        </div>
                    </div>
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

    public function createQuestion()
    {
        echo '
            <div class="wrapper">
                <div class="question-box">
                    <p class="question">Какие животные у вас есть?</p>
                </div>
            </div>
        ';
    }

    public function addNoneInput()
    {
        echo '
            <div class="wrapper">
                <div class="input-box">
                    <div class="box">
                        <input onclick="checkedValueFinder()" type="checkbox" value="0"> <p class="input-text">ЖИВОТНЫЕ ОТСУТСТВУЮТ</p>
                    </div>
                </div>
            </div>
        ';
    }

    public function createResultInput()
    {
        echo '
            <div class="wrapper">
                <div class="input-box">
                    <div class="box">
                        <input id="hidden" value="19" type="text">
                    </div>
                </div>
            </div>
        ';
    }

}

$prog = new Progression;

$prog->createPage();
$prog->createQuestion();
echo $prog->addInput('Кошка');
echo $prog->addInput('Собака');
echo $prog->addInput('Попугай');
echo $prog->addInput('Рыбки');
echo $prog->addInput('Рептилии');
$prog->addNoneInput();
$prog->createResultInput();

?>