<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>គណនាប្រាក់ប្តូរ រៀល ⇄ ដុល្លារ</title>
    <style>
        body {
            font-family: 'Khmer OS Content', Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2e8b57;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #e9f7ef;
            border-radius: 5px;
            border-left: 5px solid #2e8b57;
        }
        .rate-info {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>គណនាប្រាក់ប្តូរ រៀល ⇄ ដុល្លារ</h1>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="amount">ចំនួនប្រាក់:</label>
                <input type="number" id="amount" name="amount" placeholder="បញ្ចូលចំនួនប្រាក់" required step="0.01">
            </div>
            
            <div class="form-group">
                <label for="currency">ប្រភេទប្តូរ:</label>
                <select id="currency" name="currency" required>
                    <option value="">-- ជ្រើសរើស --</option>
                    <option value="usd_to_riel">ដុល្លារ ($) → រៀល (៛)</option>
                    <option value="riel_to_usd">រៀល (៛) → ដុល្លារ ($)</option>
                </select>
            </div>
            
            <button type="submit" name="convert">គណនា</button>
        </form>
        
        <?php
        // កំណត់អត្រាប្តូរប្រាក់ (1 USD = 4000៛)
        $exchange_rate = 4000;
        
        if (isset($_POST['convert'])) {
            $amount = floatval($_POST['amount']);
            $currency = $_POST['currency'];
            
            if ($currency == "usd_to_riel") {
                $converted = $amount * $exchange_rate;
                $result = "$" . number_format($amount, 2) . " = " . number_format($converted) . "៛";
            } elseif ($currency == "riel_to_usd") {
                $converted = $amount / $exchange_rate;
                $result = number_format($amount) . "៛ = $" . number_format($converted, 2);
            }
            
            echo '<div class="result">';
            echo '<h3>លទ្ធផល:</h3>';
            echo '<p>' . $result . '</p>';
            echo '</div>';
        }
        ?>
        
        <div class="rate-info">
            អត្រាប្តូរប្រាក់: 1 USD = <?php echo number_format($exchange_rate); ?>៛
        </div>
    </div>
</body>
</html>