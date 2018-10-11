<?php if ($post_data): ?>
    <div class="block block-viewpost">
        <div class="block-post">
            <div class="tags">
                asd
                <?= $post_data->tags ?>
            </div>
            <div class="title">
                <h1><?php if ($post_data->is_solved == 1): ?>
                        <span>[Solved]</span><?php endif; ?><?= $post_data->title ?></h1>
            </div>
            <div class="details">
                <a href="#" class="user-link"><?= $post_data->community_user_id ?></a>
                <span class="time-posted"><?= $post_data->date_created ?></span>
            </div>
            <div class="description">
                <p><?= $post_data->description ?></p>
            </div>
            <div class="info-bar">
                <div class="statistics">
                    <div class="responses">
                        <span class="counter">7</span>
                        <span class="label">answers</span>
                    </div>
                    <div class="views">
                        <span class="counter"><?= $post_data->views ?></span>
                        <span class="label">views</span>
                    </div>
                </div>
                <div class="actions">
                    <a href="#" class="action report">Report</a>
                </div>
            </div>
        </div>
        <div class="block-responses">
            <div class="block-header">
                <span class="block-responses-title">Answers (7)</span>
                <select class="" name="">
                    <option value="">Rating</option>
                    <option value="">Latest</option>
                    <option value="">Oldest</option>
                </select>
            </div>
            <div class="block-list">
                <ul class="items">
                    <li class="item">
                        <div class="item-response">
                            <div class="response-user">
                                <span class="verified">check</span>
                                <!-- Avatar Image Here -->
                                <img src="">
                            </div>
                            <div class="content">
                                <div class="response">
                                    <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                <div class="details">
                                    <a href="#" class="">Michael Jordan</a><span>2hrs ago</span>
                                </div>
                                <div class="alert alert-success">
                                    <strong class="">Marked as Solution by OP</strong>
                                </div>
                                <div class="toolbar">
                                    <div class="left">
                                        <a href="#">Like Button</a>
                                        <a href="#">Dislike Button</a>
                                    </div>
                                    <div class="right">
                                        <a href="#">Reply</a>
                                        <a href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comments">
                                <form class="" method="POST" action="">
                                    <textarea class="" name="" placeholder="Write a comment"></textarea>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-response">
                            <div class="response-user">
                                <span class="verified">check</span>
                                <!-- Avatar Image Here -->
                                <img src="">
                            </div>
                            <div class="content">
                                <div class="response">
                                    <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                <div class="details">
                                    <a href="#" class="">Michael Jordan</a><span>2hrs ago</span>
                                </div>
                                <div class="alert alert-success">
                                    <strong class="">Marked as Solution by OP</strong>
                                </div>
                                <div class="toolbar">
                                    <div class="left">
                                        <a href="#">Like Button</a>
                                        <a href="#">Dislike Button</a>
                                    </div>
                                    <div class="right">
                                        <a href="#">Reply</a>
                                        <a href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comments">
                                <form class="" method="POST" action="">
                                    <textarea class="" name="" placeholder="Write a comment"></textarea>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="item">
                        <div class="item-response">
                            <div class="response-user">
                                <span class="verified">check</span>
                                <!-- Avatar Image Here -->
                                <img src="">
                            </div>
                            <div class="content">
                                <div class="response">
                                    <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                <div class="details">
                                    <a href="#" class="">Michael Jordan</a><span>2hrs ago</span>
                                </div>
                                <div class="alert alert-success">
                                    <strong class="">Marked as Solution by OP</strong>
                                </div>
                                <div class="toolbar">
                                    <div class="left">
                                        <a href="#">Like Button</a>
                                        <a href="#">Dislike Button</a>
                                    </div>
                                    <div class="right">
                                        <a href="#">Reply</a>
                                        <a href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comments">
                                <form class="" method="POST" action="">
                                    <textarea class="" name="" placeholder="Write a comment"></textarea>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="block-answer">
            <strong class="block-answer-title">Write an Answer</strong>
            <textarea class="" name="" placeholder="Type your answer here"></textarea>
            <div class="actions-toolbar">
                <button type="submit" class="action btn-primary">Submit</button>
            </div>
        </div>
    </div>
<?php else: ?>
    <h1>Record does not exist.</h1>
<?php endif; ?>