export type Jokes = Joke[];

export interface Joke {
	title: string;
	question: string;
	answer: string;
	showAnswer: boolean;
}
