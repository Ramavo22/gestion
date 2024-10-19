<main>
    <div class="col-8 offset-2 mt-5">
        <div class="accordion" id="accordionExample">

            <div class="accordion-item mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Demande de stock Departement Prod
                    </button>
                </h2>

                <div id="collapseOne" class="accordion-collapse collapse collapsed" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="form-group mb-1 mt-3">
                            <div class="row">
                                <div class="col-3 offset-6 col-md-2 offset-md-8">
                                    <form action="#">
                                        <input type="submit" class="form-control btn btn-outline-danger" name="" id=""
                                            value="Refuser">
                                    </form>
                                </div>
                                <div class="col-3 col-md-2">
                                    <form action="#">
                                        <input type="submit" class="form-control btn btn-success" name="" id=""
                                            value="Valider">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        validation avec check box etat
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <p class="">Cliquer sur pret pour creer un bon <code>variable</code> </p>
                            <div class="col-md-12">
                                <div class="progress" style="cursor: pointer;" onclick="toggleCheckboxes()">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>

                                <div id="checkbox-list" class="mt-3" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">List des validations</h5>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="item1" disabled>
                                                <label class="form-check-label text-primary" for="item1">
                                                    Élément 1
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="item2" disabled>
                                                <label class="form-check-label text-success" for="item2">
                                                    Élément 2
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="item3" disabled>
                                                <label class="form-check-label text-danger" for="item3">
                                                    Élément 3
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="item4" disabled>
                                                <label class="form-check-label" for="item4">
                                                    Élément 4
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1 mt-3">
                                <div class="row">
                                    <div class="col-4 offset-8 col-md-2 offset-md-10 ">
                                        <form action="#">
                                            <input type="submit" class="form-control btn btn-danger" name="" id=""
                                                value="Annuler">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="form-group mb-1 mt-3">
                            <div class="row">
                                <div class="col-2 offset-8">
                                    <form action="#">
                                        <input type="submit" class="form-control btn btn-outline-danger" name="" id=""
                                            value="Refuser">
                                    </form>
                                </div>
                                <div class="col-2">
                                    <form action="#">
                                        <input type="submit" class="form-control btn btn-success" name="" id=""
                                            value="Valider">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>
<script>
    function toggleCheckboxes() {
        var checkboxList = document.getElementById("checkbox-list");
        if (checkboxList.style.display === "none") {
            checkboxList.style.display = "block";
        } else {
            checkboxList.style.display = "none";
        }
    }
</script>