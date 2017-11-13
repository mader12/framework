<div style="text-align: center;">    
    <?php if (!empty($data['error'])) : ?>
        <div style="color:red;"><?= $data['error'] ?></div>
    <?php endif; ?>

    <h3>У вас на счету <?= $data['money'] ?></h3>
    <form action="/site/getmoney" method="POST">
        <input type="hidden" name="money_have" value="<?= $data['money'] ?>"/>
        <div style="margin:10px;">
            <label for="money_off">Снять</label><input value="<?= $data['money'] ?>" style="margin-left:10px;" id="money_off" type="text" name="money_off"/>
        </div>
        <button type="submit">снять деньги</button>
    </form>
</div>
