export interface QuizAnswer {
    answerId: string,
    answer: string,
    isValid: boolean,
}

export interface QuizQuestion {
    questionId: string;
    question: string;
    multipleAnswers: boolean;
    answers: QuizAnswer[];
}

export interface QuizProps {
    answerTime: number,
    questions: QuizQuestion[];
}
