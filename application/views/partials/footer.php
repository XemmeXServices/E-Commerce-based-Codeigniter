        </div>
        <div class="col-xs-3" style="border: 2px solid black;">
            <table class="subright" cellpadding="0" cellspacing="0">
				<tr class="subrighthdr"><td>Search</td></tr>
				<tr class="subrightcntmargin"><td></td></tr>
				<tr class="subrightcnt"><td><input id="search" type="text" style="width:140px" class="textstyle" onkeypress="if (event.keyCode==13 || event.which==13) search();" value="<?php if (!empty($searched)){echo $searched;} ?>"><td></tr>
				<tr class="subrightcntmargin"><td></td></tr>
				<tr class="subrightcnt"><td><input type="button" class="buttonstyle" value="Find" onclick="search();"></td></tr>
				<tr class="subrightcntmargin"><td></td></tr>
			</table>
			<table class="subright" cellpadding="0" cellspacing="0">
				<tr class="subrighthdr"><td>Basket</td></tr>
				<tr class="subrightcntmargin2"><td></td></tr>
				<tr class="subrightcnt"><td>Basket Items: <strong><span id="basket_qty"><?php echo $basket_qty; ?></span></strong></td></tr>
				<tr class="subrightcntmargin2"><td></td></tr>
				<?php
				echo '<tr class="subrightcnt"><td><strong>Total:</strong>&nbsp;<span style="font-weight:bold;color:#990000">&pound;</span><span id="basket_total" style="font-weight:bold;color:#990000">'.number_format($basket_total,2).'</span></td></tr>';
				?>
				<tr class="subrightcntmargin2"><td></td></tr>
				<tr class="subrightcnt"><td><input type="button" class="buttonstyle" value="Checkout" onclick="parent.location='<?php echo url(); ?>checkout';"></td></tr>
				<tr class="subrightcntmargin2"><td></td></tr>
				<tr class="subrightcnt"><td><input type="button" class="buttonstyle" value="Cancel" onclick="javascript:cancel_basket();"><span id="cancel_status" style="display:none"></span></td></tr>
				<tr class="subrightcntmargin2"><td></td></tr>
			</table><br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="border: 2px solid black;">
            <a href="<?php echo url(); ?>testimonials">Testimonials</a>
            <a href="<?php echo url(); ?>privacy">Privacy</a>
            <a href="<?php echo url(); ?>terms">Terms and Conditions</a>
            <br />Copyright (c) <?php echo date('Y'); ?> {function:version}</div>
    </div>
</div>