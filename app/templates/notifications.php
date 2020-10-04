<div class="container">
<br>
    <h3>Notifications</h3>

    <div ng-repeat="push in getNotification">

        <div class="m-justify-md">
            <div class="m-card text-left">
                <div class="m-card-body">
                    <div ng-if="push.type == 'like'">
                        <h3><a ng-href="user/{{push.from}}"><strong>{{push.from}}</strong></a><a ng-href="post/{{push.ref}}"> liked your post</a></h3>
                    </div>
                    <div ng-if="push.type == 'comment'">
                        <h3><a ng-href="user/{{push.from}}"><strong>{{push.from}}</strong></a><a ng-href="comments/{{push.ref}}"> commented on your post</a></h3>
                    </div>
                    <div ng-if="push.type == 'answer'">
                        <h3><a ng-href="user/{{push.from}}"><strong>{{push.from}}</strong></a><a ng-href="post/{{push.ref}}"> answered on your post</a></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>