<?php
// テスト用の値を配列で用意
$test_values = [
    '',        // 空文字
    0,         // 数字の0
    1,         // 数字の1
    '0',       // 文字列の'0'
    'hello',   // 通常の文字列
    null,      // null値
    false,     // boolean false
];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP if empty 判定練習</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .result {
            background: #f5f5f5;
            padding: 10px;
            margin: 10px 0;
            border-left: 4px solid #007cba;
        }
        .debug {
            background: #fff3cd;
            padding: 5px;
            font-size: 12px;
            color: #856404;
        }
    </style>
</head>
<body>
    <h1>PHP if empty() 判定テスト</h1>
    
    <?php foreach ($test_values as $index => $value): ?>
        <div class="result">
            <div class="debug">
                テスト値 <?php echo $index + 1; ?>: 
                <?php 
                if (is_string($value)) {
                    echo "文字列 '" . $value . "'";
                } elseif (is_null($value)) {
                    echo "null";
                } elseif (is_bool($value)) {
                    echo $value ? 'true' : 'false';
                } else {
                    echo "数値 " . $value;
                }
                ?>
            </div>
            
            <?php if (empty($value)): ?>
                <?php if ($value === 0): ?>
                    <p>0です</p>
                <?php elseif ($value === '0'): ?>
                    <p>数字の0です</p>
                <?php else: ?>
                    <p>空文字です</p>
                <?php endif; ?>
            <?php else: ?>
                <?php if ($value === 1): ?>
                    <p>数字の1として表示される</p>
                <?php else: ?>
                    <p><?php echo htmlspecialchars($value); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    
    <hr>
    
    <h2>単体テスト用のフォーム</h2>
    <form method="POST">
        <label for="test_input">テスト値を入力:</label><br>
        <input type="text" id="test_input" name="test_input" placeholder="空文字、0、1などを試してください">
        <button type="submit">判定する</button>
    </form>
    
    <?php if (isset($_POST['test_input'])): ?>
        <div class="result">
            <div class="debug">
                入力値: '<?php echo htmlspecialchars($_POST['test_input']); ?>'
            </div>
            
            <?php 
            $input = $_POST['test_input'];
            // 数値として扱えるかチェック
            if (is_numeric($input)) {
                $input = (int)$input;
            }
            ?>
            
            <?php if (empty($input)): ?>
                <?php if ($input === 0): ?>
                    <p>0です</p>
                <?php else: ?>
                    <p>空文字です</p>
                <?php endif; ?>
            <?php else: ?>
                <?php if ($input === 1): ?>
                    <p>数字の1として表示される</p>
                <?php else: ?>
                    <p><?php echo htmlspecialchars($input); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <hr>
    
    <h2>empty()について</h2>
    <p><strong>empty()がtrueになる値:</strong></p>
    <ul>
        <li>""（空文字）</li>
        <li>0（数値のゼロ）</li>
        <li>"0"（文字列のゼロ）</li>
        <li>null</li>
        <li>false</li>
        <li>[]（空配列）</li>
    </ul>
</body>
</html>