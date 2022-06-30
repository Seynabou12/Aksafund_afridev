<?php
$this->assign('title', $this->fetch('title'));
$this->start('script'); ?>
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<?php $this->end(); ?>
<?= $this->Html->css('admin/slick.css', ['block' => 'css']) ?>
<!-- Page Heading -->
<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-start mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <a href="<?= $this->Url->build(['action' => 'index']); ?>" class="btn btn-sm btn-primary text-white px-3 text-white mr-2"><i class="fas fa-arrow-left"></i></a>
            <?= $this->fetch('title') ?>
        </h1>
    </div>
</div>

<form class="col-md-12" method="post" enctype="multipart/form-data" action="<?= $this->fetch('action') ?>">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <a href="#collapseModif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseModif">
                    <h6 class="m-0 font-weight-bold text-primary">Remplir les Sections</h6>
                </a>
                <div class="collapse show" id="collapseModif">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <?php
                            echo $this->Form->control('nom', ['class' => 'form-control', 'label' => 'Nom', 'default' => $section->nom]);
                            echo $this->Form->control('texte', ['class' => 'form-control', 'label' => 'Texte', 'default' => $section->texte]);
                            echo '<label>Theme</label>';
                            echo $this->Form->select('theme_id', $themes, ['class' => 'form-control', 'label' => 'Theme', 'default' => $section->theme_id]);
                            ?>
                            <div>
                                <div>Options</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="sliders" value="option1" name="option" onchange="handleChange(this)">
                                    <label class="form-check-label" for="sliders">Sliders</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="images" value="option2" name="option" onchange="handleChange(this)">
                                    <label class="form-check-label" for="images">Images</label>
                                </div>
                            </div>
                            <div id="option">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-4 text-right">
                                <button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle mr-2"></i>Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    let choix = document.querySelectorAll('[name="option"]')
    let nbSlider = 0;
    var divOption = document.getElementById("option");
    const handleChange = (choix) => {
        if (choix.value == "option1") {
            nbSlider = 1;
            divOption.innerHTML = ""

            let button = `<div class="form-group mt-4">
                    <div class="btn btn-primary text-white"  onclick="nbSlider++; addSlider()"><i class="fas fa-plus-circle mr-2"></i></div>
                </div>
            `;
            let element = document.createElement('div');
            element.innerHTML = button;
            divOption.append(element)
            addSlider();

        } else if (choix.value == "option2") {
            divOption.innerHTML = ""
            addImage();
        }
    }

    function addImage() {
        let div = document.createElement('div');
        div.classList.add('row');

        let div1 = document.createElement('div');
        div1.classList.add('input');
        div1.classList.add('text');
        div1.classList.add('col-6')
        html = `<label for="nom">Images (Vous pouvez selectionner plusieurs images à la fois) </label><input type="file" accept="image/*" name="images[]" multiple class="form-control" id="images">`
        div1.innerHTML = html;
        divOption.append(div1)

        let div2 = document.createElement('div');
        div2.classList.add('div');
        div2.classList.add('text');
        div2.classList.add('col-6')
        html = `
            <label for="nom">Annuler</label>
            <div class="form-group ">
                <div class="btn btn-danger text-white"  onclick="deleteSlider()"><i class="fas fa-plus-circle mr-2"></i></div>
            </div>
        `;
        div2.innerHTML = html;
        divOption.append(div2)

    }

    function addSlider() {

        let div = document.createElement('div');
        div.classList.add('row');

        let div1 = document.createElement('div');
        div1.classList.add('input');
        div1.classList.add('text');
        div1.classList.add('col-3');
        let html = `<label for="titre">Titre Slider ${nbSlider} </label><input type="text" name="titre-${nbSlider}" class="form-control" id="titre-${nbSlider}">`
        div1.innerHTML = html;
        div.append(div1)

        let div2 = document.createElement('div');
        div2.classList.add('input');
        div2.classList.add('text');
        div2.classList.add('col-3');
        html = `<label for="description">Description Slider ${nbSlider} </label><textarea class="form-control" name="description-${nbSlider}" id="description-${nbSlider}"  rows="2"></textarea>`
        div2.innerHTML = html;
        div.append(div2)

        let div3 = document.createElement('div');
        div3.classList.add('input');
        div3.classList.add('text');
        div3.classList.add('col-3');
        html = `<label for="image">Titre Slider ${nbSlider} </label><input type="file" accept="image/*" name="images-${nbSlider}" class="form-control" id="images-${nbSlider}">`
        div3.innerHTML = html;
        div.append(div3);
        divOption.append(div);

        let div4 = document.createElement('div');
        div3.classList.add('div');
        div4.classList.add('text')
        div3.classList.add('col-3');
        html = `
                <label for="nom">Annuler</label>
                <div class="form-group ">
                    <div class="btn btn-danger text-white"  onclick="deleteSlider()"><i class="fas fa-plus-circle mr-2"></i></div>
                </div>
            `;
        div4.innerHTML = html;
        div.append(div4);
        divOption.append(div);
    }
</script>
<?php $this->start('script_bottom'); ?>
<script>
    CKEDITOR.replace('description', {

    });
    $(document).ready(function() {
        var description = $('#description').val();

        $('#description').change(function() {
            description = $(this).val();
        });

    });
</script>
<?php $this->end(); ?>