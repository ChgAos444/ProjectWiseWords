document.addEventListener("DOMContentLoaded", () => {

    function setupMask(maskPathId, geomPathId) {
        const maskPath = document.querySelector(maskPathId);
        const geomPath = document.querySelector(geomPathId);

        maskPath.setAttribute("d", geomPath.getAttribute("d"));

        const length = maskPath.getTotalLength();
        maskPath.style.strokeDasharray = length;
        maskPath.style.strokeDashoffset = length;

        return maskPath;
    }

    const maskBig = setupMask("#maskPathBig", "#maskGeomBig");
    const maskSmall = setupMask("#maskPathSmall", "#maskGeomSmall");

    const tl = gsap.timeline({delay: 0.4});

    const bigPath = document.querySelector(".arrow-line.big");
    const bigArrow = document.querySelector(".arrow-head.big");

    const endPoint = bigPath.getPointAtLength(bigPath.getTotalLength());

    bigArrow.setAttribute("transform", `translate(${endPoint.x}, ${endPoint.y}) rotate(${getAngle(bigPath)})`);

    function getAngle(path) {
        const len = path.getTotalLength();
        const p1 = path.getPointAtLength(len - 1);
        const p2 = path.getPointAtLength(len);
        return Math.atan2(p2.y - p1.y, p2.x - p1.x) * (180 / Math.PI);
    }

    tl.from(".map-wrapper", {
        scale: 0,
        opacity: 0,
        duration: 0.35,
        ease: "back.out(1.3)",
        transformOrigin: "center center"
    });

    gsap.from(".map-title, .map-subtitle, .map-btn", {
        opacity: 0,
        y: 30,
        duration: 0.8,
        stagger: 0.2,
        ease: "power3.out"
    });

    tl.to(maskBig, {
        strokeDashoffset: 0,
        duration: 1.2,
        ease: "power1.inOut"
    });

    tl.to(maskSmall, {
        strokeDashoffset: 0,
        duration: 1,
        ease: "power1.inOut"
    }, "-=0.6");

    tl.to(".arrow-head", {
        opacity: 1,
        duration: 0.3,
        stagger: 0.2,
        transformOrigin: "center center"
    }, "-=0.3");
});