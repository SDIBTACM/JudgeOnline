<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 29/11/2017 23:04
 */

namespace Basic\Constant;


abstract class DataBaseTableConfig
{
    // for User
    const USER_PRIVILEGE = "privilege";
    const USER_USERS = "users";
    const USER_LOGIN_LOG = "loginlog";

    // for Problem
    const PROBLEM_COMPILE_INFO = "compileinfo";
    const PROBLEM_RUNTIME_INFO = "runtimeinfo";
    const PROBLEM_SIM = "sim";
    const PROBLEM_SOLUTION = "solution";
    const PROBLEM_SOURCE_CODE = "source_code";
    const PROBLEM_PROBLEM = "problem";

    // for Contest
    const CONTEST_CONTEST = "contest";
    const CONTEST_CONTEST_PROBLEM = "contest_problem";
    const CONTEST_CONTEST_REGISTER = "contestreg";

    // for Extra
    const EXTRA_MAIL = "mail";
    const EXTRA_MESSAGE = "message";
    const EXTRA_NEWS = "news";
    const EXTRA_ONLINE = "online";

    // for Discuss
    const DISCUSS_REPLY = "reply";
    const DISCUSS_TOPIC = "topic";

    // for Exam
    const EXAM_EX_CHOOSE = "ex_choose";
    const EXAM_EX_FILL = "ex_fill";
    const EXAM_EX_JUDGE = "ex_judge";
    const EXAM_EX_KEY_POINT = "ex_key_point";
    const EXAM_EX_PRIVILEGE = "ex_privilege";
    const EXAM_EX_QUESTION_POINT = "ex_question_point";
    const EXAM_EX_STU_ANSWER = "ex_stuanswer";
    const EXAM_EX_STUDENT = "ex_student";
    const EXAM_EXAM = "exam";
    const EXAM_EXP_QUESTION = "exp_question";
    const EXAM_FILL_ANSWER = "fill_answer";
}