/**
 * Created by aayaresko on 02.04.15.
 */

/*$.ajaxPrefilter(
    function (options, originalOptions, jqXHR) {
        options.url = 'http://backbonejs-beginner.herokuapp.com' + options.url;
    }
);*/

var Users = Backbone.Collection.extend({
    url: '/usr-auth/index'
});

var User = Backbone.Model.extend();

$('#delete-button').on('click', function (ev){
    ev.preventDefault();
})

var UserList = Backbone.View.extend({
    el: '.inner-content',
    render: function () {
        var inner = this;
        var users = new Users();
            users.fetch({
                success: function (users) {
                    var template = _.template($('#user-list-template').html());
                        template = template({users: users.models});
                        inner.$el.html(template);
                }
            });
    }
});

var EditUser = Backbone.View.extend({
    el: '.inner-content',
    render: function (options) {
        var inner = this;

        if(options.id){
            var user = new User({id: options.id});
                user.urlRoot = '/usr-auth/view';
            user.fetch({
                    success: function (user) {
                        var template = _.template($('#update-user-template').html());
                            template = template({user: user});
                        inner.$el.html(template);
                    }
                });

            inner.user = user;

        } else {
            var template = _.template($('#create-user-template').html());
                template = template({user: null});
            inner.$el.html(template);
        }
    },
    events: {
        'submit #form-edit-user': 'saveUser',
        'click .btn.delete' : 'deleteUser'
    },
    saveUser: function (ev) {
        ev.preventDefault();

        var current = $(ev.currentTarget);
            current = current.serializeJSON();
            current = current.UsrAuth;

        var user = new User();

            if(current.id) {
                user.urlRoot = '/usr-auth/update';
            } else {
                user.urlRoot = '/usr-auth/create';
            }

        user.save(current, {
           success: function (user) {
               alert('User with id ' + user.get('id') + ' successfully modified!' );
               router.navigate('home', {trigger: true});
           }
        });
    },
    deleteUser: function (ev) {
        ev.preventDefault();
        this.user.urlRoot = '/usr-auth/delete';
        this.user.destroy({
            success: function (user) {
                alert(user.get('id') + ' successfully deleted!' );
                router.navigate('home', {trigger: true});
            }
        });
    }
});

var Router = Backbone.Router.extend({
    routes: {
        '': 'home',
        'home': 'home',
        'create': 'editUser',
        'view/:id': 'editUser'
    }
});

var userList = new UserList();
var editUser = new EditUser();

var router = new Router();
    router.on('route:home', function () {
        userList.render();
    });
    router.on('route:editUser', function (id) {
        editUser.render({id: id});
    });

Backbone.history.start();