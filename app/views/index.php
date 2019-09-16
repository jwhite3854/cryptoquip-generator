<?php

require __DIR__.'/../models/Crypto.php';
require __DIR__.'/../models/Quoter.php';

$request = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$request = $_SERVER['REQUEST_METHOD'];
$quote_id = filter_input(INPUT_POST, 'quote_id', FILTER_VALIDATE_INT);
$move_qid = filter_input(INPUT_POST, 'move_qid', FILTER_SANITIZE_ENCODED);

if ( isset( $move_qid ) ) {
    $qid = ( $move_qid == 'Prev' ? $quote_id-1 : $quote_id+1 );
} else {
    $qid = ( isset($quote_id) ? $quote_id : 1 );
}

$quoter = new Quoter();
$string = $quoter->select($qid);
$crypto = new Crypto($string);

$clean_string = preg_replace('/[^\da-z]/i', '', $string);

?>

<?php if ( $request != 'POST' ): ?>
    <div style="text-align: center">
        <form action="" method="post">
            <input type="text" value="1" name="quote_id" style="margin:16px;padding:4px;width:36px"/><br/>
            <input type="submit" value="Start" style="width:120px; padding:4px;"/>
        </form>
    </div>
<?php else: ?>
    <div>
        <div id="quote_alert" class="alert" role="alert"></div>
        <?php echo $crypto->formatted(); ?>
        <div class="nav_controls">
            <form action="" method="post">
                <?php if( $qid > 1 ): ?>
                    <input type="submit" value="Prev" name="move_qid" class="btn btn-default" style="float:left"/>
                <?php endif; ?>
                <a href="#" class="btn btn-default" onclick="clearAll()" >Reset</a>
                <input type="hidden" value="<?php echo $qid ?>" name="quote_id" />
                <a href="#" class="btn btn-default" onclick="checkQuote('<?php echo strtoupper($clean_string) ?>')" >Check</a>      
                <?php if( $qid < $quoter->getQuoteCt() ): ?>
                    <input type="submit" value="Next" name="move_qid" class="btn btn-default" style="float:right"/>
                <?php endif; ?>
            </form>
        </div>
    </div>
<?php endif; ?>