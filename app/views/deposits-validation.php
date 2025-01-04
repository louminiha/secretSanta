<section class="deposits">
    <h1>Deposits</h1>
    <?php $deposits = true; if($deposits) { ?>
    <div class="deposit-list">
        <?php foreach($depots as $depot) {?>
        <div class="deposit-item"> 
            <div class="deposit-info">
                <span class="deposit-amount"><?php echo $depot['montant_depot'];?></span>
                <span class="deposit-author"><?php echo $depot['nom'];?></span>
            </div>
            <button class="validate-button"><a style="text-decoration:none; color:black" href="validation_depot/<?=$depot['id_depot']?>">Validate</a></button>
        </div>
        <?php } ?>
        <div class="deposit-item">
            <div class="deposit-info">
                <span class="deposit-amount">$250</span>
                <span class="deposit-author">Jane Smith</span>
            </div>
            <button class="validate-button"><a href="validation_depot/<?=2?>">Validate</a></button>
        </div>
        <div class="deposit-item">
            <div class="deposit-info">
                <span class="deposit-amount">$750</span>
                <span class="deposit-author">Peter Jones</span>
            </div>
            <button class="validate-button">Validate</button>
        </div>
        </div>
    <?php } else { ?>
        <h2>There's no new deposits requests for now.</h2>
    <?php } ?>
</section>