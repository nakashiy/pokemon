// ランダムの整数を生成
const getRandam = (min, max) => {
    return Math.floor(Math.random() * (max + 1 - min)) + min;
};
