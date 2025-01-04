<section class="deposits">
    <h1>Deposits</h1>
    <?php $deposits = true; if($deposits) { ?>
    <div class="deposit-list">
        <div class="deposit-item"> 
            <div class="deposit-info">
                <span class="deposit-amount">$500</span>
                <span class="deposit-author">John Doe</span>
            </div>
            <button class="validate-button">Validate</button>
        </div>
        <div class="deposit-item">
            <div class="deposit-info">
                <span class="deposit-amount">$250</span>
                <span class="deposit-author">Jane Smith</span>
            </div>
            <button class="validate-button">Validate</button>
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