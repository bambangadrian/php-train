<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

interface HumanInterface
{

    const MALE_GENDER   = 'male';

    const FEMALE_GENDER = 'female';

    public function getBirthDate();

    public function getGender();

    public function getName();
}

abstract class AbstractHuman implements \HumanInterface
{

    protected $Behave;

    private $BirthDate;

    private $Gender;

    private $Illness;

    private $Name;

    private $SicknessPosibility;

    public function addIllness($illness)
    {
        $sicknessPosibility = $this->getSicknessPosibility();
        if (in_array($illness, $sicknessPosibility, true) === false) {
            throw new \Exception($illness . ' is not availble for ' . $this->getGender());
        }
        $this->Illness[] = $illness;
    }

    public function getBirthDate()
    {
        return $this->BirthDate;
    }

    public function getGender()
    {
        return $this->Gender;
    }

    public function getInfo()
    {
        $result = $this->getName() . ' is a ' . $this->getGender() . ' (' . $this->getBehave() . ')';
        $sickness = '';
        if (count($this->Illness) > 0) {
            $sickness = implode(', ', $this->Illness);
        }
        return $result . ' has sick: (' . $sickness . ')';
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setBirthDate($birthDate)
    {
        $this->BirthDate = $birthDate;
    }

    public function setIllnes(array $illness = [])
    {
        foreach ($illness as $ill) {
            $this->addIllness($ill);
        }
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    protected function getBehave()
    {
        return $this->Behave;
    }

    protected function setBehave($behave)
    {
        $this->Behave = $behave;
    }

    protected function setGender($gender)
    {
        if ($gender !== \HumanInterface::MALE_GENDER and $gender !== \HumanInterface::FEMALE_GENDER) {
            throw new \Exception('Invalid gender given');
        }
        $this->Gender = $gender;
    }

    protected function setSicknessPosibility(array $sickness = [])
    {
        $this->SicknessPosibility = $sickness;
    }
}

class Male extends AbstractHuman
{

    public static $SicknessList = ['gonorhea'];

    public function __construct()
    {
        $this->setSicknessPosibility(self::$SicknessList);
        $this->setGender(\HumanInterface::MALE_GENDER);
        $this->setBehave('Crowdy');
    }

    public static function getSicknessPosibility()
    {
        return self::$SicknessList;
    }
}

class Female extends AbstractHuman
{

    public static $SicknessList = ['breast cancer'];

    public function __construct()
    {
        $this->setSicknessPosibility(self::$SicknessList);
        $this->setGender(\HumanInterface::FEMALE_GENDER);
        $this->setBehave('Beauty Mindset');
    }

    public static function getSicknessPosibility()
    {
        return self::$SicknessList;
    }
}

class EmployeeContract
{

    private $Company;

    private $ContractLength;

    /**
     * @var \HumanInterface $Person
     */
    private $Person;

    private $Position;

    /**
     * EmployeeContract constructor.
     *
     * @param \HumanInterface $person
     * @param  string         $company
     * @param  string         $position
     * @param string          $contractLength
     */
    public function __construct(\HumanInterface $person, $company, $position, $contractLength = '1 year')
    {
        $this->Person = $person;
        $this->Company = $company;
        $this->Position = $position;
        $this->ContractLength = $contractLength;
    }

    public function getInfo()
    {
        return $this->Person->getName() . ' (' . $this->Person->getGender() . ')  has contracted by ' . $this->Company .
            ' [' . $this->Position . ' - ' . $this->ContractLength . ']';
    }
}

try {
    $widi = new Male();
    $widi->setName('Widiyanto');
    $widi->addIllness('gonorhea');
    dump($widi->getInfo());
    # ----------
    $bambang = new Female();
    $bambang->setName('Bambang');
    dump($bambang->getInfo());
    $employeeContract = new \EmployeeContract($widi, 'invosa', 'server engineer');
    dump($employeeContract->getInfo());
    dump(\Male::getSicknessPosibility());
    dump(\Female::$SicknessList);
} catch (\Exception $ex) {
    dump($ex->getMessage());
}


# SOLID CASE: single responsibility, open closed principle, liskov subtitution, interface segregation, dependency inversion.
# 1. SRP - How to retrieve basic human information with different format (eg: using tables, serialized data, json, or maybe an array format)
# 2. OCP - Extend the employee class. and show the way to retrieve different salary model calculation without modifying the salary calculation class itself.
#    and dont forget.. to constraint all the subclass (inherited) model using interface thats a integral part of SOLID
# 3. LSP - q(x) is provable on object x of type T, then q(y) should be provable for object y of type S, where S is subtype of T
#    Eg: Makes employee as subclass of human abstract class. and try to format the information output within male, female, and employee class with the same method model
# 4. ISP - A client should not be forced to implement an interface that it doesn't use (depend on methods they do not use)
#    Eg: male, female maybe an employee or maybe not, but both of them maybe has their current job and annual income, how to differentiate and structurizing the interface?
#    and try to make manageable interface to give good api capability that will be used to fetch the work history or experience.
# 5. DIP - Entities must be depend on the abstractions not on concretions, it states the high level module must not depend on the low level module, but the should
#    depend on abstractions.
#    Eg: Create a case; public transport, that will differ the accomodation transport fee between general societies, and students. In this case students must be get 50% discount
#    and have maximum fee at IDR 5000, general passenger will be charged IDR. 2000/km, and max fee at 20000.
