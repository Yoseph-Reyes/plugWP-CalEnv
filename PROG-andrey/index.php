<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Api Mily</title>
</head>
<body>
    <div class="formContainer">
        <form action="" class="formGetAdress" id="form" method="post">
            <label for="">ZIPCODE:</label>
            <input type="text" name="form_zipcode"><br>
            <label for="">CITY:</label>
            <input type="text" name="form_city"><br>
            <label for="">State:</label>
            <input type="text" name="form_state"><br>
            <label for="">Weight:</label>
            <input type="number" step="0.01" name="form_weight"><br>
            <label for="">height:</label>
            <input type="number" step="0.01" name="form_height"><br>
            <label for="">width:</label>
            <input type="number" step="0.01" name="form_width"><br>
            <label for="">length:</label>
            <input type="number" step="0.01" name="form_length"><br>

               
            <label for="">COUNTRY:</label>
            <select name= "form_country">
                <option value="USA"> United States</option>
                <option value="CAN"> Canada</option>
            </select><br>
            
            <button type="submit" name="form__submit">mirar</button>
            
            
        </form>
    
        
    </div>

    <div class="answer" id="answer">
        
    </div>

    <script src="main.js" type="text/javascript"></script>
</body>
</html>