{{--
Renders the FAQ page, including the navbar, hero section, and FAQ accordion.
The page displays frequently asked questions about the IEEE Student Branch, including information 
about its activities, membership, and benefits.
The FAQ content is generated dynamically using the 'faqItem()' function, which creates an accordion 
item with a heading and collapsible content.
--}}

@extends('layouts/master_hf')
@section('body')
    
    <?php 
    $page_name="FAQs";
    ?> <!-- Navbar -->
    @include('components/navbar')

    <?php 
        $title="FAQs";
    ?> <!-- header -->
    @include('components/hero')

    <!-- FAQs Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
                <h1 class="mb-4">Frequently Asked Questions</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ1">
                        @include('components\faq_element')
                        @php
                            echo faqItem('headingOne', 'What does the IEEE Student Branch do?', 'The IEEE Student Branch is a student-led organization that promotes research, innovation, and professional development in the fields of electrical and electronics engineering. It organizes various events, projects, and activities to enhance the academic and practical skills of its members.', 'collapseOne',"0.1s");
                            echo faqItem('headingTwo', 'How can I join?', 'To join the IEEE Student Branch, you need to be a student at the university where the branch is located. You can contact the branch representatives or attend one of their events to learn more about the membership process.', 'collapseTwo',"0.2s");
                            echo faqItem('headingThree', 'What events and activities does the branch organize?', 'The IEEE Student Branch organizes a variety of events and activities, including technical workshops, guest lectures, coding competitions, hackathons, project showcases, and networking events. These activities aim to enhance the practical skills and knowledge of members in various areas of electrical and electronics engineering.', 'collapseThree',"0.3s");
                            echo faqItem('headingFour', 'Joining is free?', 'Joining the IEEE Student Branch is free, but joining IEEE has a small membership annual cost for students', 'collapseFour',"0.4s");
                        @endphp
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ1">
                        @php
                            echo faqItem('headingFive', 'Can I volunteer or participate in projects?', 'Yes, the IEEE Student Branch encourages its members to volunteer and participate in various projects. Each member should be participate in at least on project. These projects provide hands-on experience and opportunities to apply theoretical knowledge in practical settings. Members can collaborate with other students on innovative projects.', 'collapseFive',"0.5s");
                            echo faqItem('headingSix', 'What are the benefits of being an IEEE student member?', 'Being an IEEE student member offers several benefits, including access to valuable resources, networking opportunities, discounts on IEEE publications and events, and the chance to participate in IEEE competitions and conferences. Additionally, student members can gain leadership experience by serving on branch committees and organizing events.', 'collapseSix',"0.6s");
                            echo faqItem('headingSeven', 'How can I get involved in the IEEE Student Branch?', 'To get involved in the IEEE Student Branch, you can attend their events, join their mailing list, or reach out to the branch representatives. They will provide you with information on how to become a member and participate in various activities and projects.', 'collapseSeven',"0.7s");
                            echo faqItem('headingEight', 'What kind of projects do IEEE Student Branch members work on?', 'IEEE Student Branch members work on a wide range of projects related to electrical and electronics engineering, such as robotics, IoT, machine learning, and more. These projects allow members to apply their theoretical knowledge to real-world problems and gain practical experience.', 'collapseEight',"0.8s");
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection