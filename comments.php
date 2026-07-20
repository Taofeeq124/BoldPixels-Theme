<?php
if (post_password_required()) {
    return;
}
?>

<div class="comments">

    <?php if (have_comments()) : ?>

        <h4>
            <?php
            printf(
                _n('%s Comment', '%s Comments', get_comments_number(), 'textdomain'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h4>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ul',
                'short_ping' => true,
                'avatar_size'=> 60,
            ));
            ?>
        </ul>

        <?php the_comments_pagination(); ?>

    <?php endif; ?>


    <?php

    comment_form(array(

        'title_reply' => 'Leave a Reply',

        'class_form' => 'comment-form',

        'class_submit' => 'btn',

        'label_submit' => 'Send',

        'comment_field' => '
            <p class="comment-form-comment">
                <textarea id="comment" name="comment" placeholder="Message" required></textarea>
            </p>
        ',

        'fields' => array(

            'author' => '
                <p class="comment-form-author">
                    <input id="author" name="author" type="text" placeholder="Name" required>
                </p>
            ',

            'email' => '
                <p class="comment-form-email">
                    <input id="email" name="email" type="email" placeholder="Email" required>
                </p>
            ',

            'url' => '
                <p class="comment-form-url">
                    <input id="url" name="url" type="url" placeholder="Website">
                </p>
            ',
        ),

    ));

    ?>

</div>