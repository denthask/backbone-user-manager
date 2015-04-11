<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<script type="text/template" id="user-list-template">
    <h1>User list</h1>
    <div class="row">
        <?= Html::a('Create', '#/create', ['class' => 'btn btn-primary']) ?>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <% _.each(users, function (user) { %>
            <tr>
                <td><%= user.get('id') %></td>
                <td><%= user.get('name') %></td>
                <td><%= user.get('email') %></td>
                <td><a href="#/view/<%= user.get('id') %>" class="btn btn-success">Update</a> </td>
            </tr>
            <% }); %>
            </tbody>
        </table>
    </div>
</script>

<script type="text/template" id="create-user-template">
    <h1>Create user</h1>
    <div class="row">
        <div class="col-lg-3">
            <?php $form = ActiveForm::begin(['id' => 'form-edit-user', 'action' => '']); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-success', 'name' => 'create-user-button']) ?>
                <?= Html::a('Cancel', '#/home',['class' => 'btn btn-danger', 'id' => 'cancel-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</script>

<script type="text/template" id="update-user-template">
    <h1>Update user</h1>
    <div class="row">
        <div class="col-lg-3">
            <form method="post" id="form-edit-user">
                <input type="hidden" value="M2FBaU5MWmhdChcsAjs3L2UsIxkfGg87VlkCGHsoIyEDIihEBg0VKw==" name="_csrf">
                <input type="hidden" value="<%= user.get('id') %>" name="UsrAuth[id]">
                <div class="form-group field-usrauth-name">
                    <label for="usrauth-name" class="control-label">Name</label>
                    <input type="text" name="UsrAuth[name]" class="form-control" id="usrauth-name" value="<%= user.get('name') %>">
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-usrauth-email">
                    <label for="usrauth-email" class="control-label">Email</label>
                    <input type="text" name="UsrAuth[email]" class="form-control" id="usrauth-email" value="<%= user.get('email') %>">
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-usrauth-password">
                    <label for="usrauth-password" class="control-label">Password</label>
                    <input type="password" name="UsrAuth[password]" class="form-control" id="usrauth-password">
                    <div class="help-block"></div>
                </div>
                <div class="form-group">
                    <button name="create-user-button" class="btn btn-warning" type="submit">Save</button>
                    <a href="#/home" class="btn btn-success" id="cancel-button">Cancel</a>
                    <button name="delete-user-button" class="btn btn-danger delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</script>