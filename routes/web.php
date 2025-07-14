<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Services\ExerciseReview;
use App\Http\Controllers\Services\StudentProgressController;
use App\Models\StudentWork;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

####authentication
Auth::routes(['verify' => true]);

####change language
Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');

##################################################################
########################  All Users Routes  ######################
##################################################################
Route::middleware(['count.visitors', 'web'])->group(function () {
    ########user profile
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');

    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/works', [HomeController::class, 'works'])->name('works');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/add_comment', [UserCommentController::class, 'create'])->name('add_comment');
    Route::post('/save_user_comment', [UserCommentController::class, 'store'])->name('save_user_comment');
    //Route::get('/posts',[PostController::class,'index'])->name('show_post');
    Route::get('/home/course/list', [HomeController::class, 'listCourses'])->name('course');
    Route::get('/home/course/details/{courseId}', [HomeController::class, 'showCourseDetails'])->name('course_details');
    Route::get('/home/posts', [PostController::class, 'listPosts'])->name('home_posts');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('show_post');
    Route::any('searching/posts', [PostController::class, 'searching'])->name('searching_post');
    Route::get('/certificate/print/{courseId}/{studentId}', [StudentProgressController::class, 'printCertificate'])->name('printCertificate');

    #####not active
    Route::get('/notActive', [UserProfileController::class, 'notActive'])->name('notActive');
    Route::get('/student/works/shows/',[StudentWorkController::class,'showStudentWork'])->name('student_work_show_all');
    Route::post('/contact/store',[ContactUS::class,'store'])->name('contact_us_store');
});



##########################################################################
########################  Super Admin user Routes ########################
##########################################################################
Route::middleware(['is.super.admin', 'verified'])->group(function () {

    Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin');

    ############policies route
    Route::get('/policies/list', [PoliciesController::class, "listPolicies"])->name("list_policies");
    Route::get('/policies/create', [PoliciesController::class, "addPolicies"])->name("add_policies");
    Route::post('/policies/store', [PoliciesController::class, "store"])->name("save_policies");
    Route::get('/policies/edit/{PoliceId}', [PoliciesController::class, 'edit'])->name('edit_policies');
    Route::post('/policies/update/{PoliceId}', [PoliciesController::class, 'update'])->name('update_policies');
    Route::get('/policies/active/{PoliceId}', [PoliciesController::class, 'toggle'])->name('toggle_policies');

    ############works route
    Route::get('/works/list', [WorkController::class, 'index'])->name('list_works');
    Route::get('/works/create', [WorkController::class, 'create'])->name("add_work");
    Route::post('/works/store', [WorkController::class, 'store'])->name('save_works');
    Route::get('/works/edit/{workId}', [WorkController::class, 'edit'])->name("edit_work");
    Route::post('/works/update/{workId}', [WorkController::class, 'update'])->name('update_works');
    Route::get('/works/active/{workId}', [WorkController::class, 'active'])->name('active');
    Route::get('/works/delete/{workId}', [WorkController::class, 'delete'])->name('work_delete');

    ############user comments
    Route::get('/user/list', [UserProfileController::class, "listUser"])->name("list-user");
    Route::get('/user/active/{userId}', [UserProfileController::class, 'toggle'])->name('toggle_users');
    Route::get('/user/edit/{userId}', [UserProfileController::class, 'editUser'])->name('edit_user');
    Route::post('/user/update/{userId}', [UserProfileController::class, 'updateUser'])->name('update_users');

    ############Display comments
    Route::get('/comment/list', [DisplayCommentController::class, 'index'])->name('list_display_comments');
    Route::get('/comment/create', [DisplayCommentController::class, 'create'])->name('add_display_comment');
    Route::post('/comment/store', [DisplayCommentController::class, 'store'])->name('save_comment');
    Route::get('/comment/edit/{commentId}', [DisplayCommentController::class, 'edit'])->name('edit_comment');
    Route::post('/comment/update/{commentId}', [DisplayCommentController::class, 'update'])->name('update_comment');
    Route::get('/comment/active/{commentId}', [DisplayCommentController::class, 'active'])->name('toggle_comment');
    Route::get('/comment/users/list', [UserCommentController::class, 'index'])->name('list_user_comment');
    Route::get('/comment/delete/{workId}', [DisplayCommentController::class, 'delete'])->name('delete_comment');

    #####Posts route
    Route::get('/post/list', [PostController::class, "index"])->name("list_posts");
    Route::get('/post/create', [PostController::class, "create"])->name("add_post");
    Route::post('/post/store', [PostController::class, "store"])->name("posts_save");

    Route::get('/post/category/list', [PostCategoryController::class, "index"])->name("list_post_category");
    Route::post('/post/category/store', [PostCategoryController::class, "store"])->name("store_post_category");
    Route::post('/post/category/update', [PostCategoryController::class, "update"])->name("update_post_category");
    Route::get('/post/category/toggle/{postCategoryId}', [PostCategoryController::class, "toggle"])->name("toggle_post_category");
    Route::get('/post/category/delete/{postCategoryId}', [PostCategoryController::class, "delete"])->name("delete_post_category");

    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('edit_post');
    Route::post('/post/update/{postId}', [PostController::class, 'update'])->name('update_post');
    Route::get('/post/active/{postId}', [PostController::class, 'toggle'])->name('toggle_post');
    Route::get('/post/image/edit/{postId}', [PostController::class, 'reviewImage'])->name('edit_image');
    Route::post('/post/image/update/{postId}', [PostController::class, 'updateImage'])->name('update_image');
    Route::any('/post/image/delete/{postId}', [PostController::class, 'deleteImage'])->name('delet_image');
    Route::get('/post/delete/{postId}', [PostController::class, 'delete'])->name('post_delete');

    #####Trainers route
    Route::get('/trainers/list', [TrainerInfoController::class, 'index'])->name('trainers_list');
    Route::get('/trainers/create', [TrainerInfoController::class, 'create'])->name('trainers_create');
    Route::post('/trainers/store', [TrainerInfoController::class, 'store'])->name('trainers_store');
    Route::get('/trainers/edit/{trainerId}', [TrainerInfoController::class, 'edit'])->name('trainers_edit');
    Route::post('/trainers/update', [TrainerInfoController::class, 'update'])->name('trainers_update');
    Route::get('/trainers/show/{id}', [TrainerInfoController::class, 'show'])->name('trainers_show');

    #####courses route
    Route::get('/courses/list', [CoursesController::class, 'index'])->name('courses_list');
    Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses_create');
    Route::post('/courses/store', [CoursesController::class, 'store'])->name('courses_store');
    Route::get('/courses/edit/{trainerId}', [CoursesController::class, 'edit'])->name('courses_edit');
    Route::post('/courses/update', [CoursesController::class, 'update'])->name('courses_update');
    Route::get('/courses/toggle/{courseId}', [CoursesController::class, 'toggle'])->name('courses_toggle');
    Route::get('/courses/delete/{courseId}', [CoursesController::class, 'delete'])->name('course_delete');

    #####topics route
    // Route::get('/topics/list/{courseId}', [TopicController::class, 'index'])->name('topics_list');
    Route::post('/topics/store', [TopicController::class, 'store'])->name('topics_store');
    Route::post('/topics/update', [TopicController::class, 'update'])->name('topics_update');
    Route::get('/topics/toggle/{courseId}', [TopicController::class, 'toggle'])->name('topics_toggle');
    Route::get('/topics/delete/{postId}', [TopicController::class, 'delete'])->name('topic_delete');

    #####lessons route
    Route::get('/lessons/list/{topicId}', [LessonController::class, 'index'])->name('lessons_list');
    Route::get('/lessons/show', [LessonController::class, 'show'])->name('lessons_show');
    Route::get('/lessons/create/{topicId}', [LessonController::class, 'create'])->name('lessons_create');
    Route::post('/lessons/store', [LessonController::class, 'store'])->name('lessons_store');
    Route::get('/lessons/edit/{trainerId}', [LessonController::class, 'edit'])->name('lessons_edit');
    Route::post('/lessons/update', [LessonController::class, 'update'])->name('lessons_update');
    Route::get('/lessons/toggle/{courseId}', [LessonController::class, 'toggle'])->name('lessons_toggle');
    Route::get('/lessons/delete/video/{path}', [LessonController::class, 'deleteVideo'])->name('deleted_video');
    Route::post('/upload/video', [LessonController::class, 'uploadVideo'])->name('uploadVideo');
    Route::get('/lessons/delete/{lessonId}', [LessonController::class, 'delete'])->name('lesson_delete');

    // Route::get('/upload/video', function () {
    //     return view("upload-video");
    // });
    #####exercises route
    Route::get('/exercises/list/{topicId}', [ExerciseController::class, 'index'])->name('exercises_list');
    Route::get('/exercises/show', [ExerciseController::class, 'show'])->name('exercises_show');
    Route::post('/exercises/store', [ExerciseController::class, 'store'])->name('exercises_store');
    Route::get('/exercises/edit/{trainerId}', [ExerciseController::class, 'edit'])->name('exercises_edit');
    Route::post('/exercises/update', [ExerciseController::class, 'update'])->name('exercises_update');
    Route::get('/exercises/toggle/{courseId}', [ExerciseController::class, 'toggle'])->name('exercises_toggle');
    Route::post('/exercises/deleteFile/', [ExerciseReview::class, 'deleteExerciseFile'])->name('exercises_delete_file');
    Route::get('/exercise/delete/{Id}', [ExerciseController::class, 'delete'])->name('exercise_delete');

    #####notification route
    Route::get('/notification/list', [NotificationController::class, 'index'])->name('show_notification');
    Route::get('/notification/isSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');
#student Course
    Route::get('/student/course/list/notactive',[StudentCourseController::class,'listUnActiveStudentsCourses'])->name('listUnActiveStudentsCourses');
    Route::get('/student/course/toggle/{courseId}/{status}',[StudentCourseController::class,'toggle'])->name('student_course_toggle');
    Route::get('/student/courses/review',[SuperAdminController::class,'courseReview'])->name('course_review');
#student Works
    Route::post('/student/works/store',[StudentWorkController::class,'store'])->name('student_work_store');
    Route::get('/student/works/list/{courseId}',[StudentWorkController::class,'index'])->name('student_work_list');
    Route::get('/student/works/active/{workId}',[StudentWorkController::class,'active'])->name('student_work_active');
    Route::get('/student/works/delete/{workId}',[StudentWorkController::class,'delete'])->name('student_work_delete');
#setting
    Route::get('/setting/list',[SettingController::class,'index'])->name('settings_list');
    Route::post('/setting/update',[SettingController::class,'update'])->name('settings_update');
});

###############################################################
########################  Trainer Routes ######################
###############################################################
Route::middleware(['is.active', 'is.trainer', 'verified'])->group(function () {
    Route::get('/trainer', [AdminController::class, 'index'])->name('admin');
    Route::get('/trainers/show/{id}', [TrainerInfoController::class, 'show'])->name('trainers_show');
    Route::get('/topics/list/{courseId}', [TopicController::class, 'index'])->name('topics_list');

    #exercise Review
    Route::get('/trainer/exercise/review/{coursesIds}', [ExerciseReview::class, 'listStudent'])->name('exercise_review');
    Route::get('/trainer/exercise/review/student-course/{studentId}/{courseId}', [ExerciseReview::class, 'StudentExercise'])->name('exercise_student');
    Route::post('/trainer/exercise/review/fetch-all-exercise/{studentId}/{courseId}', [ExerciseReview::class, 'fetchAllExerciseDone'])->name('fetch_all_exercise');

    Route::get('/trainer/exercise/review/download/{filepath}', [ExerciseReview::class, 'downloadExercise'])->name('download_exercise_student');
    Route::any('/trainer/exercise/review/mark/store', [ExerciseReview::class, 'storeMark'])->name('markStore');

    Route::post('/course/appendix/store', [CoursesController::class, 'storeAppendix'])->name('course_appendix_store');
    Route::get('/course/appendix/list/{courseId}', [CoursesController::class, 'listAppendix'])->name('course_appendix_list');
    Route::get('/course/appendix/delete/{appendixId}', [CoursesController::class, 'deleteAppendix'])->name('course_appendix_delete');
});

##################################################################
########################  Auth user Routes  ######################
##################################################################
Route::middleware(['is.active', 'auth', 'verified', 'count.visitors'])->group(function () {

    ########user profile
    Route::any('create_profile', [UserProfileController::class, 'create'])->name('create_profile');
    Route::post('store_profile', [UserProfileController::class, 'store'])->name('store_profile');
    Route::any('edit_profile', [UserProfileController::class, 'edit'])->name('edit_profile');
    Route::post('update_profile', [UserProfileController::class, 'update'])->name('update_profile');

    #######user dashboard
    Route::get('/dash-user', [UserProfileController::class, 'userDashboard'])->name('dash-user');
    Route::get('/dash-user/subscribedCourses', [UserProfileController::class, 'subscribedCourses'])->name('subscribedCourses');
    Route::get('/dash-user/completedCourses', [UserProfileController::class, 'completedCourses'])->name('completedCourses');

    Route::get('/dash-user', [UserProfileController::class, 'userDashboard'])->name('dash-user');
    Route::get('/student/course/list/', [StudentCourseController::class, 'index'])->name('student_course_list');
    Route::post('/student/course/subscribe/', [StudentCourseController::class, 'store'])->name('subscribe_store');
    Route::get('/student/course/subscribe/{course}', [StudentCourseController::class, 'create'])->name('subscribe_create');

    ########## notification route #######
    Route::get('/makeNotificationSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');
    Route::get('/student/course/continue/{courseId}', [StudentCourseController::class, 'continueLearn'])->name('continue_learn');
    Route::get('/student/course/haveExercise/{courseId}/{lessonId}', [ExerciseController::class, 'haveExercise'])->name('haveExercise');
    Route::get('student/exercise/download/{filepath}', [ExerciseController::class, 'download'])->name('download_exercise');

    ######### Exercise Done
    Route::post('/exercise/upload', [ExerciseDoneController::class, 'store'])->name('upload_exercise');
    Route::get('/continue/lesson/next/{courseId}/{lessonId}', [StudentProgressController::class, 'getNextLesson'])->name('getNextLesson');
    Route::get('/continue/lesson/previous/{courseId}/{lessonId}', [StudentProgressController::class, 'getPreviousLesson'])->name('get_previous_lesson');
    Route::get('/continue/lesson/{courseId}/{lessonId}', [StudentProgressController::class, 'getLesson'])->name('get_lesson');

    ########lesson
    Route::get('student/lesson/download/{filepath}', [LessonController::class, 'download'])->name('download_lesson_appendixes');
    Route::get('/course/appendix/{courseId}', [StudentCourseController::class, 'showAppendixes'])->name('show_resources');

    ########course
    Route::get('/course/inquiries/{courseId}', [InquiryController::class, 'index'])->name('course-inquiries');
    Route::post('/course/inquiries/store', [InquiryController::class, 'store'])->name('course-inquiries-store');
    Route::post('/course/replies/store', [ReplyController::class, 'store'])->name('course-replies-store');
    Route::post('/course/inquiries/deleted/', [InquiryController::class, 'deleteInquiry'])->name('course-inquiries-delete');
    Route::post('/course/replies/deleted/', [ReplyController::class, 'deleteReply'])->name('course-replies-delete');
    Route::post('/course/inquiries/update/', [InquiryController::class, 'update'])->name('course-inquiries-edit');
    Route::post('/course/replies/update/', [ReplyController::class, 'update'])->name('course-replies-edit');

    Route::get('/course/evaluations/{studentCourseId}', [EvaluationController::class, 'show'])->name('show-evaluation');
    Route::post('/course/evaluations/store', [EvaluationController::class, 'store'])->name('course-evaluations-store');
    // Route::post('/course/replies/store', [ReplyController::class, 'store'])->name('course-replies-store');
    Route::post('/student/course/subscribe/',[StudentCourseController::class,'store'])->name('subscribe_store');
    Route::get('/student/course/subscribe/{course}',[StudentCourseController::class,'create'])->name('subscribe_create');
    Route::get('/student/course/completed/{courseId}',[StudentProgressController::class,'completedCourse'])->name('completed_course');

    Route::get('/student/get/degree/{courseId}/{studentId}', [StudentProgressController::class, 'getDegree'])->name('get_degree');
    Route::any('/post/save/like/{postId}', [PostController::class, 'saveLike'])->name('save-like');
    Route::any('/checkSpentCertificate/{courseId}/{studentId}', [ExerciseReview::class, 'spentCertificate'])->name('checkSpentCertificate');
    // Route::get('/course/appendix/download/{filepath}',[CoursesController::class,'downloadAppendix'])->name('download_course_appendix');
    Route::get('/course/appendix/download/{filepath}', [StudentCourseController::class, 'downloadAppendix'])->name('download_appendix');
    Route::get('/notification/clear', [NotificationController::class, 'clear'])->name('clear_notification');

});

// Route::get('/student/course/list/', [StudentCourseController::class, 'index'])->name('student_course_list');
// Route::get('/student/course/show/', [StudentCourseController::class, 'show'])->name('student_course_show');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link'); // this will do the command line job
});
