# Client Communication

> What is the state of the MVP? Is it usable? Bug free? If not, how much more time do you need for Phase 1?

To meet the 4-hour deadline specified in the requirements, I decided to utilize existing tools (Laravel, Inertia, Vue) and packages (Sanctum, Telescope) to streamline some processes. As per the README.md instructions, you may set it up locally & give it a shot. I am confident the API & the frontend is working as the task descriptions require. To ensure quality, I wrote several test cases to verify much of the logic (e.g. the API endpoints). _I also conducted some QA testing to ensure that all scenarios have been considered._

> How do we maintain a full and accurate history of orders given changing products, discounts, and users?

We are currently storing the amount paid by the customer for their order. Updates to the product title and the addition of discounts have been reserved for Phase Two. Keeping this in mind, I will make sure to store this information within the orders table to maintain an accurate record of any changes to these properties over time.

_It is important to note that any dollar amount stored is captured in cents (the currency's smallest denominator)._ 

>A ‘shopping cart’, where users can view their selections before purchasing, was not included as part of the Phase 1 requirements. Do you feel it should be a part of the MVP, or did you include it? Why or why not? There is no ‘right’ answer.

I did not include this feature in the first MVP because there would not have been enough time to create a stable ("shippable") code for this feature. I do believe it makes sense developing during Phase 2 because the Shopping Cart experience does create a sense of familiarity which will increase the UX.

> Please deliver an estimate for Phase 2. How many hours would it take? On what date can you deliver?

For Phase 2, I am considering using Laravel Nova as our administrative platform. This will significantly reduce development time but we would need to acquire a license to access its full capabilities. I would advise against building a custom admin panel for cost reasons, unless it's part of the product I was selling. Developing an in-house administrative platform can be rather time consuming.

If we decide to go with Nova, I estimate that Phase 2 can be completed within a week. This estimation is based on the following tasks:

- Implementing the necessary API endpoints and logic
- Writing numerous test cases for future-proofing the project
- Designing, implementing, and integrating the UI
- Conducting manual & automated testing to refine the user experience
- Being able to use `@stacksjs/tables` to render tables in the admin panel

_I would also suggest to have a look at Algolia's E-Commerce API._

While there is a good chance that most of the code can be completed within a week, I rather under-promise and over-deliver. From my experience working with clients, I quite often had to pad time estimates developers shared with me.

> In Phase 3, the client would like to allow customers to pay within the application. Do you have any recommendations for the client?

Yes, I love working with "payments" but the answer to your question may vary and here is why: 

The payment gateway choice should depend on the country where most of the customers are located. As a starting point, using Stripe is a great option. However, if your target customers are based in the US and primarily use PayPal, then choosing a service that supports multiple payment gateways such as Paddle, Chargebee, or Thrivecart is an option. On the other hand, if a SaaS client has countless customers all throughout the world, for tax reasons, a Merchant of Record option like Paddle can make sense.

For Stacks I am about to develop a payments integration that's very similar to Laravel Cashier. It will be a TypeScript alternative, and I will be using Stripe as the payment gateway.
