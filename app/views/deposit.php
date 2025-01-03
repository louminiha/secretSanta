<!-- <section id="deposit">
  <div class="deposit-container">
    <h2>Faire un dépôt</h2>
    <form id="deposit-form" action="faire_depot">
      <div class="input-group">
        <label for="amount">Montant :</label>
        <input type="number" id="amount" name="montant_depot" placeholder="0.00" min="0" step="0.01" required>
        <span class="currency">€</span> </div>
      <button type="submit" class="deposit-button">Déposer</button>
    </form>
  </div>
</section> -->
<sectio id="deposit">
    <div id="details-profile">
        <h1>Hello $username</h1>
        <div class="details">
            <div class="info">
      
                <p class="value"><?php echo $_SESSION['mail'];?></p>
                <p class="field">email</p>
            </div>
            <div class="info">
                <p class="value"><?php echo $argent ;?></p>
                <p class="field">Montant actuel</p>
            </div>
        </div>
    </div>
    <div class="form">
        <h2>Make a deposit </h2>
        <form action="">
            <label for="amount">Enter a number</label>
            <input id="amount" type="number">
            <button type="submit">Submit</button>
        </form>
    </div>
</section>