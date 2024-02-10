<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<div>
    <form action="<?= site_url('login/auth'); ?>" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    <?php if(session()->getFlashdata('msg')):?>
        <div>
            <?= session()->getFlashdata('msg'); ?>
        </div>
    <?php endif;?>
</div>

</body>
</html>
