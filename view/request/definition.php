<div class="card p-1">
    <div class="card p-1" id="bodyRequestDash">
        <h2 class="comment-title"><?= __("request_request.settings-teacher.title") ?></h2>
        <p class="timeline-description"><?= __("request_request.settings-teacher.description") ?></p>

        <div class="custom-select-container">
            <form id="addTeacher">
                <select required name="professor" class="form-control select2">
                    <option value="" disabled selected><?= __("request_request.settings-teacher.select") ?></option>
                    <?php foreach ($teachers as $teacher) { ?>
                        <option <?php if ($request["professor_avaliador"] == $teacher["id"]) {
                                    echo "selected";
                                } ?> value="<?= $teacher["id"] ?>"><?= $teacher["nome"] ?> <?= $teacher["sobrenome"] ?></option>
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
            <form id="changeStage">
                <select class="form-control select2" name="stage">
                    <?php foreach ($allStageTypes as $stage) { ?>
                        <?php foreach ($proccessStages as $processStage) { ?>
                            <?php if ($processStage["tipo"] == $stage["id"]) { ?>
                                <option <?= $request["etapa_atual"] == $processStage['id'] ? "selected" : ""; ?> value="<?= $processStage["id"] ?>"><?= $stage["nome"] ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
                <input type="text" name="request" value="<?= $args["processId"] ?>" hidden>
                <button class="btn btn-primary" style="margin-top:20px; float:right;"><?= __("request_request.settings-status.button") ?></button>
            </form>
        </div>
    </div>

    <div class="card p-1" id="bodyRequestDash">
        <h2 class="comment-title"><?= __("request_request.settings-conclude.title") ?></h2>
        <p class="timeline-description"><?= __("request_request.settings-conclude.description") ?></p>
        <form id="closeTicket">
            <input type="text" name="request" value="<?= $request['id'] ?>" hidden>

            <div class="settings-radio-group">
                <?php foreach ($allStageTypes as $stage) { ?>
                    <?php foreach ($proccessStages as $processStage) { ?>
                        <?php if ($processStage["tipo"] == $stage["id"]) { ?>
                            <label class="settings-radio-option me-1">
                                <input type="radio" class="settings-radio-option-2" name="stage" value="<?= $processStage["id"] ?>">
                                <span class="settings-radio-label"><?= $stage["nome"] ?></span>
                            </label>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <br />

            <div class="settings-conclusion-comment">
                <textarea placeholder="Descrição da conclusão" name="comentario" rows="4" class="form-control textarea"></textarea>
            </div>
            <br />


            <button class="btn btn-danger" style="margin-top:20px; float:right;"><?= __("request_request.settings-conclude.button") ?></button>
        </form>
    </div>
</div>
