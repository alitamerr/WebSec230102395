<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .calculator-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-group button {
            width: 48px;
            height: 48px;
            font-size: 20px;
        }
        #result {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @extends('layouts.master')

    @section('title', 'Calculator')

    @section('content')
    <div class="container">
        <div class="calculator-container">
            <h2 class="text-center">Simple Calculator</h2>

            <div class="mb-3">
                <label for="num1" class="form-label">Enter First Number:</label>
                <input type="number" id="num1" class="form-control" placeholder="First number">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Enter Second Number:</label>
                <input type="number" id="num2" class="form-control" placeholder="Second number">
            </div>

            <div class="btn-group d-flex justify-content-center mb-3">
                <button class="btn btn-primary" onclick="calculate('+')">+</button>
                <button class="btn btn-secondary" onclick="calculate('-')">-</button>
                <button class="btn btn-success" onclick="calculate('*')">×</button>
                <button class="btn btn-danger" onclick="calculate('/')">÷</button>
            </div>

            <h4 class="text-center">Result: <span id="result">0</span></h4>
        </div>
    </div>

    <script>
        function calculate(operator) {
            let num1 = parseFloat(document.getElementById("num1").value);
            let num2 = parseFloat(document.getElementById("num2").value);
            let result = 0;

            if (isNaN(num1) || isNaN(num2)) {
                alert("Please enter valid numbers.");
                return;
            }

            switch (operator) {
                case '+': result = num1 + num2; break;
                case '-': result = num1 - num2; break;
                case '*': result = num1 * num2; break;
                case '/': 
                    if (num2 === 0) {
                        alert("Cannot divide by zero!");
                        return;
                    }
                    result = num1 / num2; 
                    break;
            }

            document.getElementById("result").innerText = result;
        }
    </script>
    @endsection
</body>
</html>
