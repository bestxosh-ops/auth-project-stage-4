<!DOCTYPE html>
<html>
    <style>
body {
    background: linear-gradient(135deg, #1f1c2c, #928dab);
    height: 100vh;
    margin: 0;
    font-family: "Poppins", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-card {
    background: #ffffff;
    padding: 40px;
    border-radius: 12px;
    width: 350px;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.2);
    animation: fadeIn 0.8s ease-in-out;
}

.login-card h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
    font-weight: 600;
}

.login-card input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
    font-size: 15px;
}

.login-card input:focus {
    border-color: #6a5acd;
    outline: none;
    box-shadow: 0px 0px 5px rgba(106, 90, 205, 0.6);
}

.login-card button {
    width: 100%;
    padding: 12px;
    background: #6a5acd;
    color: white;
    border: none;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.2s;
}

.login-card button:hover {
    background: #5847c4;
}

.error-msg {
    background: #ffdddd;
    padding: 10px;
    border-left: 5px solid #ff5c5c;
    margin-bottom: 15px;
    border-radius: 5px;
    color: #a30000;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<head>
    <meta charset="UTF-8">
</head>
<body>
 
    <div class="login-card">
    <h2>Login</h2>

    @error('email')
        <div class="error-msg">{{ $message }}</div>
    @enderror

    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
