<?php
function findPatternOccurrences($text, $pattern) {
    $textLength = strlen($text);
    $patternLength = strlen($pattern);
    $occurrences = 0;

    for ($i = 0; $i <= $textLength - $patternLength; $i++) {
        $substring = substr($text, $i, $patternLength);

        if ($substring === $pattern) {
            $occurrences++;
        }
    }

    return $occurrences;
}
$result = "";

if (isset($_POST['pattern']) && isset($_POST['text'])) {
    $pattern = $_POST['pattern'];
    $text = $_POST['text'];

    $occurrences = findPatternOccurrences($text, $pattern);

    $result = "The pattern \"$pattern\" appears in the text \"$text\" $occurrences times.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pattern Search</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Pattern Search</h1>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="pattern">Pattern:</label>
                        <input type="text" id="pattern" name="pattern" class="form-control" required value="<?= $pattern ?>">
                    </div>
                    <div class="form-group">
                        <label for="text">Text:</label>
                        <textarea id="text" name="text" class="form-control" rows="4" required><?= $text ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Find Occurrences</button>
                </form>
            </div>
        </div>

        <?php if (!empty($result)): ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Result</h5>
                    <p class="card-text"><?= $result ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>