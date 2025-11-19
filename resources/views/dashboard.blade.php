<!DOCTYPE html>
<html>
    <style>
body {
    background: linear-gradient(135deg, #232526, #414345);
    font-family: "Poppins", sans-serif;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.dashboard {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 50px;
    width: 450px;
    text-align: center;
    color: white;
    border-radius: 15px;
    box-shadow: 0px 10px 25px rgba(0,0,0,0.3);
    animation: fadeIn 0.8s ease-in-out;
}

.dashboard h2 {
    font-size: 28px;
    margin-bottom: 20px;
    font-weight: 600;
}

.dashboard form button {
    padding: 12px 25px;
    background: #ff5c5c;
    border: none;
    border-radius: 8px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    transition: 0.2s;
}

.dashboard form button:hover {
    background: #e23e3e;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
   <div class="dashboard">
    <h2>Welcome, {{ Auth::user()->name }}</h2>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>