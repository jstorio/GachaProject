var base = 1000;

var multiplier = {
    COMMON : 0.75,
    UNCOMMON : 0.25,
    RARE : 0.15,
    VERYRARE : 0.05,
    EXTREMERARE : 0.025,
    COSMIC : 0.005
};

var rng = Math.random() * base;
console.log(rng);
console.log(rng > multiplier.UNCOMMON * base > multiplier.COMMON * base);
