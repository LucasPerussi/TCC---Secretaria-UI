<div class="card p-1">
    <div class="card p-1" id="bodyRequestDash">
        <h2 class="comment-title"><?= __("request_request.settings-teacher.title") ?></h2>
        <p class="timeline-description"><?= __("request_request.settings-teacher.description") ?></p>

        <div class="custom-select-container">
            <form id="addTeacher">
                <select required name="professor" class="form-control select2">
                    <option value="" disabled selected><?= __("request_request.settings-teacher.select") ?></option>
                    <?php foreach ($teachers as $teacher) { ?>
                        <option <?php if ($request["professor_avaliador"] == $teacher["id"]){echo "selected";}?> value="<?= $teacher["id"] ?>"><?= $teacher["nome"] ?> <?= $teacher["sobrenome"] ?></option>
                    <?php } ?>
                </select>
                <input type="text" hidden name="processo" value="<?= $request["id"] ?>">
                <button class="btn btn-primary" type="submit" style="margin-top:20px; float:right;"><?= __("request_request.settings-teacher.button") ?></button>
            </form>
        </div>
    </div>

    <div class="card p-1" id="bodyRequestDash">
        <h2 class="comment-title"><?= __("request_request.settings-status.title") ?></h2>
        <p class="timeline-description"><?= __("request_request.settings-status.description") ?></p>

        <div class="custom-select-container">
            <select class="form-control select2">
                <option value="" disabled selected><?= __("request_request.settings-status.select") ?></option>
                <option value="Opção 1">Opção 1</option>
                <option value="Opção 2">Opção 2</option>
                <option value="Opção 3">Opção 3</option>
            </select>

            <button class="btn btn-primary" style="margin-top:20px; float:right;"><?= __("request_request.settings-status.button") ?></button>
        </div>
    </div>

    <div class="card p-1" id="bodyRequestDash">
        <h2 class="comment-title"><?= __("request_request.settings-conclude.title") ?></h2>
        <p class="timeline-description"><?= __("request_request.settings-conclude.description") ?></p>

        <div class="settings-radio-group">
            <label class="settings-radio-option me-1">
                <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="deferido">
                <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-deferido") ?></span>
            </label>
            <label class="settings-radio-option me-1">
                <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="indeferido">
                <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-indeferido") ?></span>
            </label>
            <label class="settings-radio-option me-1">
                <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="concluido">
                <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-concluido") ?></span>
            </label>
            <label class="settings-radio-option me-1">
                <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="cancelado">
                <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-cancelado") ?></span>
            </label>
        </div>
        <br />

        <div class="settings-conclusion-comment">
            <textarea placeholder="Descrição da conclusão" rows="4" class="form-control textarea"></textarea>
        </div>
        <br />

        <!-- <div class="file-upload-container">
            <p class="file-upload-title"><?= __("request_request.settings-conclude.send-file") ?></p>
            <div class="file-upload-area">
                <div class="file-upload-clickable">
                    <i class="bi bi-pencil"></i>
                    <span class="file-upload-label"><?= __("request_request.settings-conclude.choose-file") ?></span>
                </div>
                <div class="file-upload-selected">
                    <?= __("request_request.settings-conclude.no-file") ?>
                </div>
            </div>
        </div> -->
        <button class="btn btn-danger" style="margin-top:20px; float:right;"><?= __("request_request.settings-conclude.button") ?></button>

    </div>
</div>