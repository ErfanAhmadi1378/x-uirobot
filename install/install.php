<?php
if(isset($_REQUEST['updateBot'])){
    require "update.php";
    require "../baseInfo.php";
    
    $connection = new mysqli('localhost', $dbUserName, $dbPassword, $dbName);
    
    if($connection->connect_error){
        showResult(false, "خطای دیتابیس: " . $connection->connect_error);
        exit();
    }
    
    updateBot();
}

function showResult($success, $msg) {
    $icon  = $success ? '✅' : '❌';
    $color = $success ? '#10b981' : '#ef4444';
    echo "<script>document.getElementById('result').innerHTML='<p style=\"color:{$color};font-size:1.1rem;\">{$icon} {$msg}</p>';document.getElementById('spinner').style.display='none';</script>";
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>نصب / آپدیت ربات WizWiz</title>
<link rel="stylesheet" href="../assets/webconf.css">
<style>
  body { display:flex; align-items:center; justify-content:center; min-height:100vh; }
  .card {
    background:#fff; border-radius:16px; padding:36px 32px 28px;
    box-shadow:0 8px 32px rgba(0,0,0,0.18); max-width:460px; width:92%;
    border-top:5px solid #4361ee;
  }
  .logo { text-align:center; margin-bottom:20px; }
  .logo h1 { color:#4361ee; font-size:1.6rem; margin:0; }
  .logo p  { color:#888; font-size:.88rem; margin:4px 0 0; }
  label { display:block; font-size:.88rem; color:#555; margin:10px 0 4px; font-weight:600; }
  input[type=text] {
    width:100%; border:1.5px solid #d0d7e2; border-radius:10px;
    background:#f7f8fc; padding:10px 14px; font-size:14px;
    font-family:inherit; transition:border-color .25s; outline:none; color:#333;
  }
  input[type=text]:focus { border-color:#4361ee; box-shadow:0 0 0 3px rgba(67,97,238,.12); background:#fff; }
  .btn-install {
    cursor:pointer; width:100%; border:none; border-radius:10px;
    background:linear-gradient(90deg,#4361ee 0%,#7b2ff7 100%);
    color:#fff; padding:13px; font-size:15px; font-family:inherit;
    font-weight:700; margin-top:14px;
    box-shadow:0 4px 14px rgba(67,97,238,.35);
    transition:transform .15s, box-shadow .2s;
  }
  .btn-install:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(67,97,238,.45); }
  .divider { border:none; border-top:1px solid #eee; margin:20px 0; }
  #result { min-height:28px; text-align:center; }
  #spinner { display:none; margin:12px auto; width:36px; height:36px;
    border:4px solid rgba(67,97,238,.15); border-top-color:#4361ee;
    border-radius:50%; animation:spin .8s linear infinite; }
  @keyframes spin { to { transform:rotate(360deg); } }
  .badge-version { display:inline-block; background:#e0e7ff; color:#4361ee;
    padding:2px 12px; border-radius:20px; font-size:.78rem; font-weight:700; margin-right:6px; }
</style>
</head>
<body>
<div class="card">
  <div class="logo">
    <h1>🤖 WizWiz XUI Bot</h1>
    <p><span class="badge-version">v10.4.0</span> پنل نصب و آپدیت</p>
  </div>
  <hr class="divider">

  <form method="POST" onsubmit="startUpdate(event)">
    <label>توکن ربات تلگرام</label>
    <input type="text" name="botToken" placeholder="123456789:AAExxxxx..." required>

    <label>آیدی عددی ادمین اصلی</label>
    <input type="text" name="adminId" placeholder="مثلاً: 123456789" required>

    <label>نام دیتابیس</label>
    <input type="text" name="dbName" placeholder="xui_bot" required>

    <label>نام کاربری دیتابیس</label>
    <input type="text" name="dbUser" placeholder="root" required>

    <label>رمز عبور دیتابیس</label>
    <input type="text" name="dbPass" placeholder="رمز عبور MySQL">

    <label>آدرس سایت (با / ختم شود)</label>
    <input type="text" name="botUrl" placeholder="https://example.com/bot/">

    <button type="submit" name="updateBot" value="1" class="btn-install">
      🚀 نصب / آپدیت دیتابیس
    </button>
  </form>

  <div id="spinner"></div>
  <div id="result"></div>
</div>

<script>
function startUpdate(e) {
  document.getElementById('spinner').style.display = 'block';
  document.getElementById('result').innerHTML = '<p style="color:#888">⏳ در حال پردازش...</p>';
}
</script>
</body>
</html>
