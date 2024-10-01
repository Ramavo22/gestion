<?php
    $listeByCentre=getDataUrl("/compta/repartition");

?>
<main>
    <div class="container mt-5 ">
        <div class="card">
            <!-- <div class="card-header">
                <h4></h4>
            </div> -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th><h4>Repartition Administrative</h4></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th class="col">Repartition</th>
                        <th class="col">Cout direct</th>
                        <th class="col">Cle</th>
                        <th class="col">Administration</th>
                        <th class="col">Cout Total</th>
                    </tr>
             <?php for ($i=0; $i <count($listeByCentre['repartition_structure']) ; $i++) { ?>
             <tr>
                 <td><?php echo $listeByCentre['operationnels'][$i]['centre']['label'] ?></td>
                 <td><?php echo number_format($listeByCentre['operationnels'][$i]['montant'],2).'AR'  ?></td>
                 <td>46,30 %</td>
                 <td><?php echo $listeByCentre['repartition_structure'][ $listeByCentre['operationnels'][$i]['centre']['label'] ] ?></td>
                 <td><?php echo number_format ($listeByCentre['repartition'][$i]['montant'],2).'AR' ?></td>
                </tr>
                <?php } ?>
                
                    
                  
                </table>
            </div>
        </div>
       
        <div class="row mt-5 mb-5">
            <div class="col-6">
                <div class="card ">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>COUT DU KG MAIS GRAIN</th>
                                <th class="text-end"><button class="btn btn-outline-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal"><b>Demo</b></button></th>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="#">

                                                <div class="modal-body">
                                                    <input type="text" class="form-control" name="simule_nombre" placeholder="Nombre de produit entrant">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" type="submit">Valider</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    </div>
                            </tr>
                            <tr>
                                <td>Unite doeuvre</td>
                                <td class="text-end">kg de grain de MAïS entrant</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td class="text-end">481456</td>
                            </tr>
                            <tr>
                                <td>Cout Plantation</td>
                                <td class="text-end">481456</td>
                            </tr>
                            <tr>
                                <td>COUT DU KG grain MAïS</td>
                                <td class="text-end">481456</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>COUT EN DEVISE</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Euro</td>
                                <td class="text-end">0.91</td>
                            </tr>
                            <tr>
                                <td>Dollar</td>
                                <td class="text-end">0.61</td>
                            </tr>
                        </table>
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
</main>