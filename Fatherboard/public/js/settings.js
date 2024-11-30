
class AddressElement extends HTMLElement
{
    constructor()
    {
        super();
        this.attachShadow({mode:"open"});

        let addressTemplate = document.getElementById("address-template");

        let content = addressTemplate.content;
        console.log(content);
        this.shadowRoot.append(content.cloneNode(true));
    }
}
customElements.define(
    "address-element",
    AddressElement
)

