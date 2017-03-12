<?php
/**
 * Created by PhpStorm.
 * User: NB0065
 * Date: 12/03/2017
 * Time: 00:04
 */

namespace Blog\Controller;


use Blog\Form\CommentForm;
use Blog\Model\Comment;
use Blog\Model\CommentTable;
use Blog\Model\PostTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    /**
     * @var PostTable
     */
    private $table;
    /**
     * @var CommentTable
     */
    private $commentTable;

    public function __construct(PostTable $table, CommentTable $commentTable)
    {
        $this->table = $table;
        $this->commentTable = $commentTable;
    }

    public function indexAction()
    {
        $postTable = $this->table;

        return new ViewModel([
            'posts' => $postTable->fetchAll()
        ]);
    }

    public function showAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $commentForm = new CommentForm();

        if (!$id) {
            return $this->redirect()->toRoute('site-post');
        }

        try {
            $post = $this->table->find($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('site-post');
        }

        return new ViewModel([
            'post' => $post,
            'commentForm' => $commentForm
        ]);
    }

    public function addCommentAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('site-post');
        }
        $request = $this->getRequest();
        $commentForm = new CommentForm();
        if (!$request->isPost()) {
            return new ViewModel([
                'id' => $id,
                'form' => $commentForm
            ]);
        } else {
            try {
                $post = $this->table->find($id);
            } catch (\Exception $e) {
                return $this->redirect()->toRoute('site-post');
            }

            $commentForm->setData($request->getPost());

            if (!$commentForm->isValid()) {
                return $this->redirect()->toRoute('site-post', ['action' => 'show', 'id' => $post->id]);
            }
            $data = $commentForm->getData();
            $data['post_id'] = $post->id;
            $comment = new Comment();
            $comment->exchangeArray($data);
            $this->commentTable->save($comment);
            return $this->redirect()->toRoute('site-post', ['action' => 'show', 'id' => $post->id]);
        }

    }

}