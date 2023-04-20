<div class="row">
    <div class="container col-3 text-center">
        <ul class="list-group">
            <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                TOTENS UP.
                <span class="badge badge-success badge-pill"><?php echo $up; ?></span>
            </li>
        </ul>
        <?php if ($up >= '1') { ?>
            <div class="underline"><span></span></div>
        <?php } ?>

    </div>

    <div class="container col-3 text-center">
        <ul class="list-group">
            <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                TOTENS via protocolo ICMP
                <span class="badge badge-primary badge-pill"><?php echo $contar; ?></span>
            </li>
        </ul>
        <div class="underline"><span></span></div>
    </div>

    <div class="container col-3 text-center">
        <ul class="list-group">
            <li class="shadow-lg p-3 mb-5 rounded list-group-item d-flex justify-content-between align-items-center text-white bg-dark">
                TOTENS com falha de ping.
                <span class="badge badge-danger badge-pill"><?php echo $dow; ?></span>
            </li>
        </ul>
        <div class="underline"><span></span></div>
    </div>
</div>