<main>
    <div class="container mt-5">
        <div class="col-8 offset-2">
            <div class="">
                <h3 class="text-center display-4">Demande</h3>
                <form action="">
                    <div class="form-group input-prod mb-3">
                        <div class="row">
                            <div class="col-10 col-md-11">
                                <input type="text" class="form-control" name="Hierarchie[]" id="" placeholder="Hierarchie">
                            </div>
                            <div class="col-2 col-md-1">
                                <button type="button" class="btn btn-warning" id="add-prod">+</button>
                            </div>
                        </div>
                    </div>
                    <div id="prod_group">
                    </div>
                   <div class="form-group mb-3">
                        <input type="date" class="form-control" name="demander" id="">
                   </div>
                   <div class="form-group mb-3">
                        <input type="text" class="form-control" name="" id="" list="list-depart">
                        <datalist id="list-depart">
                            <option value="Finance">Departement Finance</option>
                        </datalist>
                   </div>
                    <div class="form-group mb-3">
                        <textarea name="" class="form-control" id="" placeholder="Description de demande"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-2">
                                <form action="#">
                                    <input type="submit" class="form-control btn btn-outline-danger" name="" id="">
                                </form>
                            </div>
                            <div class="col-2 offset-8">
                                <form action="#">
                                    <input type="submit" class="form-control btn btn-primary" name="" id="">
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    var button = document.getElementById("add-prod");
    button.addEventListener('click', function(){
        var group_prod = document.getElementById("prod_group");
        var object = document.createElement("div");
        object.classList.add('form-group','input-prod','mb-3');
        object.innerHTML = `
            <div class="row">
                <div class="col-10 col-md-11">
                    <input type="text" class="form-control" name="Hierarchie[]" placeholder="Hierarchie">
                </div>
                <div class="col-2 col-md-1">
                    <button type="button" class="btn btn-danger remove-prod">−</button>
                </div>
            </div>`;
        group_prod.appendChild(object);
        attachRemoveEvent(object); 
    });

    function attachRemoveEvent(row) {
        var removeButton = row.querySelector('.remove-prod');
        if (removeButton) {
            removeButton.addEventListener('click', function() {
                row.remove();
            });
        }
    }

    document.querySelectorAll('.input-prod').forEach(function(row) {
        attachRemoveEvent(row);
    });
</script>
