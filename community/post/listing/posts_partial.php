<div class="actions-bar">
    <div class="list-controls">
        <div class="row">
            <div class="col-lg-3 no-gap">
                <select class="form-control">
                    <option value="">All Categories</option>
                    <option value="">Sample 1</option>
                    <option value="">Sample 2</option>
                    <option value="">Sample 3</option>
                    <option value="">Sample 4</option>
                </select>
            </div>
            <div class="col-lg-3 no-gap m-l-10">
                <select class="form-control">
                    <option value="">Latest</option>
                    <option value="">Trending</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="list-labels">
    <div class="row">
        <div class="col-lg-9">
            <div class="list-label-wrapper first">
                <strong>Topic</strong>
            </div>
        </div>
        <div class="col-lg-1 no-gap">
            <div class="list-label-wrapper">
                <strong>Answers</strong>
            </div>
        </div>
        <div class="col-lg-1 no-gap">
            <div class="list-label-wrapper">
                <strong>Views</strong>
            </div>
        </div>
        <div class="col-lg-1 no-gap">
            <div class="list-label-wrapper">
                <strong>Activity</strong>
            </div>
        </div>
    </div>
</div>
<div class="list-items">
    <div class="item" v-for="post in posts">
        <div class="row post-item">
            <div class="col-lg-9 v-center first">
                <div class="post-info">
                    <a href="#" class="link-title">{{ post.title }}</a>
                    <span class="description">{{ post.description }}</span>
                </div>
            </div>
            <div class="col-lg-1 v-center no-gap">
                <span class="post-counter">32</span>
            </div>
            <div class="col-lg-1 v-center no-gap">
                <span class="post-counter">44</span>
            </div>
            <div class="col-lg-1 v-center no-gap">
                <span class="post-activity">2h ago</span>
            </div>
        </div>
    </div>
</div>
