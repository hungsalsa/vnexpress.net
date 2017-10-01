<style type="text/css">
    /* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

</style>
<h3 style="text-align: center;font-style: italic;font-size: 16px;">Xin chào <?= $_SESSION['HoTen'] ?> </h3>

    <?php if (isset($_SESSION['idUser']) && $_SESSION['idGroup'] ==1): ?>
        <a href="/admin" target="_blank"><button  style="width:90%;margin-left: 10px;font-size: 17px;">Vào trang quản trị</button></a>
    <?php endif ?>

<form method="post">
    <button name="logOut"  style="width:90%;margin-left: 10px;font-size: 18px;">Thoát</button>
</form>
