<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="table">

        <?php

        class Book
        {
            public $title;
            public $author;
            public $date;

            public function __construct($title, $author, $date)
            {
                $this->title = $title;
                $this->author = $author;
                $this->date = $date;
            }
        }

        $books = [new Book("Bible", "William Bob", "20.20.20"), new Book("Był sobie pies", "William Bob", "20.20.20")];

        foreach ($books as $value) {
            echo 
        "<div class=\"row\">
            <div class=\"title\">$value->title</div>
            <div class=\"author\">$value->author</div>
            <div class=\"date\">$value->date</div>
        </div>";
        }

        ?>
    </div>

</body>
</html>